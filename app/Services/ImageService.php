<?php
/**
 * Created by PhpStorm.
 * User: alexa
 * Date: 23/11/2016
 * Time: 10:27
 */

namespace App\Services;

use Intervention\Image\Facades\Image;

class ImageService
{

    protected $directory;

    private $originalImageName;

    /**
     * handle of upload and process of image
     * @param $folder
     * @param $request
     * @return string
     */
    public function processTo($folder, $request, $input_name = 'image')
    {
        $this->directory = storage_path() . '/app/images/' . $folder;

        //set the name
        $this->originalImageName = 'original-' . md5(microtime()) . '.' . $request->file($input_name)->getClientOriginalExtension();

        //upload and save
        $this->store($request->file($input_name));

        ///crop image
        if ($request->has('crop_options')) {
            $filename = $this->crop($request->get('crop_options'));
            return 'images/' . $folder . $filename;
        } else {
            return 'images/' . $folder . $this->originalImageName;
        }
    }

    /**
     * handle of upload and process of image from data uri format
     *
     * Tu definis une destination
     * Tu crée l'image
     * Tu génère le nom de l'image
     * Vu qu'elle est crée et que tu connais pas son format
     * Puis tu l'encode en jpg oklm et tu la stocke au bon endroit
     * Enfin tu renvoie le chemin pour la sauvegarde en bdd
     *
     * @param $data_uri
     * @param $folder
     * @return string
     */
    public function processFromDataUri($data_uri, $folder)
    {
        $this->directory = storage_path() . '/app/images/' . $folder;

        $image = Image::make($data_uri);

        $image_name = "img_" . str_random(10) . '.jpg';

        $image->encode('jpg')->save($this->directory . $image_name);

        return $this->directory . $image_name;
    }

    /**
     * after upload, move to folder
     * @param $file
     */
    public function store($file)
    {
        $file->move($this->directory, $this->originalImageName);
    }

    /**
     * crop with parameters and return name of image
     * @param $json
     * @return string
     */
    public function crop($json)
    {
        $options = json_decode($json);
        $filename = md5(microtime()) . '.jpg';
        $image = Image::make($this->directory . $this->originalImageName);
        $image->crop(intval($options->width), intval($options->height), intval($options->x), intval($options->y));
        $image->save($this->directory . $filename);
        return $filename;
    }

}
