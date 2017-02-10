<?php
/**
 * Created by PhpStorm.
 * User: LocalUser
 * Date: 09/02/2017
 * Time: 15:52
 */

namespace App\Services;


use App\Helpers\ColorHelper;
use App\Invoice;
use App\Quote;
use App\Template;
use Intervention\Image\Facades\Image;

class TemplateParserService
{

    private $type;
    private $entity;
    private $template;
    private $canvas;
    private $texts;

    // 200DPI A4 width and height
    private $canvas_a4_width = 1654;
    private $canvas_a4_height = 2339;
    private $scale_ratio = 0;


    /*
     * TEST URL : http://iris-crm.dev/templates/generate/quote/1/2
     */

    public function __construct($type, $id_entity, $id_template)
    {
        $this->type = $type;

        if ($this->type === "quote") {
            $this->entity = Quote::findOrFail($id_entity);
        }

        if ($this->type === "invoice") {
            $this->entity = Invoice::findOrFail($id_entity);
        }

        $this->template = Template::findOrFail($id_template);

        $this->findScale();
        $this->mapTexts();
        $this->createCanvas();
        $this->parse();
    }

    /**
     * We need to have a scale to make a document fits to a specific format (A4)
     * So We have to scale the elements to a specific size ( position / height / width )
     * The height is variable so it does not matters
     */
    public function findScale()
    {
        $this->scale_ratio = $this->canvas_a4_width / $this->template->canvas_width;
    }

    /**
     * We need to map the texts for the canvas because of placeholders / translations etc etc
     */
    public function mapTexts()
    {

    }

    /**
     * We generate a canvas for our objects, this an object so we can resize it later
     */
    public function createCanvas()
    {
        $bg_color = ColorHelper::stringToHex($this->template->bg_color);

        $this->canvas = Image::canvas($this->canvas_a4_width, $this->canvas_a4_height, $bg_color);
    }

    /**
     * Parse the content to add element to the canvas
     */
    private function parse()
    {
        $content = json_decode($this->template->content);


        foreach ($content->objects as $object) {

            if ($object->type == "text") {


                $scale_x = (isset($object->scaleX)) ? $object->scaleX : 1;
                $scale_y = (isset($object->scaleY)) ? $object->scaleY : 1;

                $width = intval(($object->width * $scale_x) * $this->scale_ratio);
                $height = intval(($object->height * $scale_y) * $this->scale_ratio);

                $left = intval($object->left * $this->scale_ratio);
                $top = intval($object->top * $this->scale_ratio);


                $img = $this->makeCanvasFormText($left, $top, $object->text, $object->fontSize);

                $img->text($object->text, 20, 20, function ($font) use ($object) {
                    $font->size($object->fontSize);
                    $font->color(ColorHelper::stringToHex($object->fill));
                    $font->file(resource_path('assets/fonts/calibri_bold.ttf'));
                });

                $img->resize($width, $height);

                $this->canvas->insert($img, 'top-left',
                    intval($left - (($width) / 2)),
                    intval($top - (($height) / 2))
                );


            }

            if ($object->type == "image") {

                // create instance
                $img = Image::make($object->src);

                $scale_x = (isset($object->scaleX)) ? $object->scaleX : 1;
                $scale_y = (isset($object->scaleY)) ? $object->scaleY : 1;

                $width = intval(($object->width * $scale_x) * $this->scale_ratio);
                $height = intval(($object->height * $scale_y) * $this->scale_ratio);

                $left = intval($object->left * $this->scale_ratio);
                $top = intval($object->top * $this->scale_ratio);

                // resize image to fixed size
                $img->resize($width, $height);

                $this->canvas->insert($img, 'top-left',
                    intval($left - (($width) / 2)),
                    intval($top - (($height) / 2))
                );
            }

        }
    }

    public function makeCanvasFormText($x, $y, $text, $fontSize)
    {
        $box = imagettfbbox($fontSize, 0, resource_path('assets/fonts/calibri_bold.ttf'), trim($text));
        $boxCheat = imagettfbbox($fontSize, 0, resource_path('assets/fonts/calibri_bold.ttf'), trim("qpgé5É"));

        $topLeftX = $x - 10;
        $topLeftY = $y + $box[7];
        $botRightY = 0;
        $botRightX = 0;

        switch ($fontSize) {
            case 25:
                $botRightX = $x + (($box[2] / 1.30) - (log(strlen(trim($text))))) + 10;
                $botRightY = $y + ($boxCheat[3] - 1);
                break;
            case 20:
                $botRightX = $x + (($box[2] / 1.23) - (log(strlen(trim($text))))) + 5;
                $botRightY = $y + ($boxCheat[3] - 1);
                break;
        }

        return Image::canvas(abs(intval($topLeftX - $botRightX)), abs(intval($topLeftY - $botRightY)), '#ABCDEF');

    }

    /**
     *  Export To Image
     */
    public function toImage()
    {
        //dd($this->template, $this->entity, $this->type);

        return $this->canvas->response();
    }
}