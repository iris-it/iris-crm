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
use Spatie\Browsershot\Browsershot;

class TemplateHtmlParserService
{

    // Quote or Invoice
    private $type;
    private $id_entity;

    // Elements of the canvas
    private $entity_top;
    private $entity_bottom;

    // Json base structure
    private $template;

    // Translations
    private $texts;

    // Each parts of the final image
    private $canvas_top;
    private $canvas_table;
    private $canvas_bottom;

    // Final image
    private $master_canvas;

    // 200DPI A4 width and height
    private $canvas_a4_width = 1200;

    private $canvas_top_height = 750;
    private $canvas_bottom_height = 300;

    // Scale ratio for adjusting the position and size
    private $scale_ratio = 0;


    /*
     * TEST URL : http://iris-crm.dev/templates/generate/quote/1/2
     */

    public function __construct($type, $id_entity, $id_template)
    {
        $this->type = $type;

        $this->id_entity = $id_entity;

        $this->template = Template::findOrFail($id_template);

        $this->findScale();

        $this->mapTexts();

        $this->mapObjectsToPosition();

        $this->createCanvas();

        $this->createCanvasTable();

        $this->parse($this->entity_top, $this->canvas_top);

        $this->parse($this->entity_bottom, $this->canvas_bottom);

        $this->makeMasterCanvas();
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
     * We need to map the texts for the canvas because of placeholders / translations etc etc
     */
    public function mapObjectsToPosition()
    {
        $content = json_decode($this->template->content);

        foreach ($content->objects as $object) {

            $object->top = (isset($object->top)) ? $object->top : 0;

            if ($object->top < ($this->template->canvas_height / 2)) {

                // Ratio
                $object->top = intval((($object->top * $this->canvas_top_height) / ($this->template->canvas_height / 2)) / $this->scale_ratio) + 50;

                $this->entity_top[] = $object;
            }

            if ($object->top > ($this->template->canvas_height / 2)) {

                // Cut in Half
                $object->top = intval($object->top - ($this->template->canvas_height / 2));

                // Ratio
                $object->top = intval((($object->top * $this->canvas_bottom_height) / ($this->template->canvas_height / 2)) / $this->scale_ratio) - 30;

                $this->entity_bottom[] = $object;
            }
        }
    }

    /**
     * We generate a canvas for our objects, this an object so we can resize it later
     */
    public function createCanvas()
    {
        $bg_color = ColorHelper::stringToHex($this->template->bg_color);

        // To redefine ( fine adjusting )
        $this->canvas_top = Image::canvas($this->canvas_a4_width, $this->canvas_top_height, $bg_color);

        // To redefine ( fine adjusting )
        $this->canvas_bottom = Image::canvas($this->canvas_a4_width, $this->canvas_bottom_height, $bg_color);
    }

    /**
     * We generate a canvas for our objects, this an object so we can resize it later
     */
    public function createCanvasTable()
    {

        // Fetch image

        // Get Height

        // Create Canvas

        // Insert Canvas

        // https://github.com/spatie/browsershot

        $this->canvas_table = Image::canvas($this->canvas_a4_width, 500, '#ABCDE');
    }

    /**
     * Parse the content to add element to the canvas
     */
    private function parse($objects, $canvas)
    {

        foreach ($objects as $object) {

            if (isset($object->iris_identifier) && in_array($object->iris_identifier, ['content_ph'])) {
                continue;
            }

            if ($object->type == "text") {

                $font_family = resource_path('assets/fonts/calibri.ttf');

                if (isset($object->fontWeight) && $object->fontWeight === 'bold') {
                    $font_family = resource_path('assets/fonts/calibri_bold.ttf');
                }


                $canvas->text($object->text, ($object->left * $this->scale_ratio), ($object->top * $this->scale_ratio), function ($font) use ($object, $font_family) {
                    $font->size($object->fontSize);
                    $font->color(ColorHelper::stringToHex($object->fill));
                    $font->file($font_family);
                    $font->align('left');
                    $font->valign('top');
                });

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

                $canvas->insert($img, 'top-left',
                    intval($left - (($width) / 2)),
                    intval($top - (($height) / 2))
                );
            }
        }
    }

    /**
     *  Assemble the canvas
     */
    public function makeMasterCanvas()
    {

        // space at top
        $margin_top = 0;

        // space at bottom
        $margin_bottom = 0;

        // pixels to remove before the element ( pseudo margin )
        $margin_canvas_top = 0;
        $margin_canvas_table = 120;
        $margin_canvas_bottom = 60;

        $canvas_top = $this->canvas_top;
        $canvas_top_height = $this->canvas_top->height();

        $canvas_table = $this->canvas_table;
        $canvas_table_height = $this->canvas_table->height();

        $canvas_bottom = $this->canvas_bottom;
        $canvas_bottom_height = $this->canvas_bottom->height();

        $this->master_canvas = Image::canvas($this->canvas_a4_width, ($margin_top + $canvas_top_height + $canvas_table_height + $canvas_bottom_height + $margin_bottom));


        $this->master_canvas->insert(Image::make($canvas_top), 'top-left', 0, ($margin_top) - $margin_canvas_top);

        $this->master_canvas->insert(Image::make($canvas_table), 'top-left', 0, ($margin_top + $canvas_top_height) - $margin_canvas_table);

        $this->master_canvas->insert(Image::make($canvas_bottom), 'top-left', 0, ($margin_top + $canvas_top_height + $canvas_table_height) - $margin_canvas_bottom);

    }

    /**
     *  Export To Image
     */
    public function toImage()
    {
        return $this->master_canvas->response();
    }
}