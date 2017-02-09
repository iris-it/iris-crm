<?php
/**
 * Created by PhpStorm.
 * User: LocalUser
 * Date: 09/02/2017
 * Time: 15:52
 */

namespace App\Services;


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
        $this->canvas = Image::canvas($this->canvas_a4_width, $this->canvas_a4_height, $this->template->bg_color);
    }

    /**
     * Parse the content to add element to the canvas
     */
    private function parse()
    {
        $content = json_decode($this->template->content);

        foreach ($content->objects as $object) {

            if ($object->type == "text") {

                $this->canvas->text($object->text, ($object->left * $this->scale_ratio), ($object->top * $this->scale_ratio), function ($font) use ($object) {
                    $font->size($object->fontSize);
                    $font->color($object->fill);
                    $font->file(resource_path('assets/fonts/calibri_bold.ttf'));
                });

            }

            if ($object->type == "image") {

                // create instance
                $img = Image::make($object->src);

                // resize image to fixed size
                $img->resize(intval($object->width * $this->scale_ratio), intval($object->height * $this->scale_ratio));

                $this->canvas->insert($img, 'top', intval($object->left * $this->scale_ratio), intval($object->top * $this->scale_ratio));

            }

        }
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