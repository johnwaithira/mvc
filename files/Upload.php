<?php

namespace Students\John\files;

use Students\John\app\core\Request;
use Students\John\app\Http\Format\Generator\Rand;
use Students\John\app\Http\Format\Input;

class Upload
{
    public string $filename ;
    public string $path;
    public static string $dir;

    public function __construct()
    {
        $this->path = "public";
        self::$dir = "";
        $this->filename = "upload";

    }

    public function imgExtension()
    {
        return [
            "jpg",
            "jpeg",
            "png",
            "webp"
        ];
    }

    public function image(Request $request)
    {
        $imageExtension = pathinfo(
            $request->files()
            [
                $this->filename
            ]
            [
                'name'
            ],
            PATHINFO_EXTENSION
        );

        if(in_array($imageExtension, $this->imgExtension()))
        {
            $fileName = "upload". Rand::make(4)."data.".$imageExtension;
            $fileTmp  = $request->files()[$this->filename]["tmp_name"];

            if(file_exists(dirname(__DIR__)."/".$this->path."/".self::$dir."/".$fileName))
            {
                $fileName = strchr(
                    ".",
                    "-",
                    basename(
                        $fileName,
                        $imageExtension
                    )
                );

                $fileName = $fileName . Rand::make(4).".". $imageExtension;
            }

            if(move_uploaded_file($fileTmp, dirname(__DIR__)."/". $this->path."/".self::$dir."/". $fileName))
            {
                return $fileName;
            }
            else
            {
                return 0;
            }


        }



    }

    public function images(Request $request)
    {
        $imageNames = [];
        foreach ($request->files()[$this->filename]['tmp_name'] as $key => $file)
        {
            $fileName = $request->files()[$this->filename]['name'][$key];
            $fileTemp = $request->files()[$this->filename]['tmp_name'][$key];

            $imgExtension = pathinfo($fileName, PATHINFO_EXTENSION);

            if(in_array($imgExtension, $this->imgExtension()))
            {
                $fileName = "upload_2023".Rand::make(5)."---.".$imgExtension;
                if(file_exists(dirname(__DIR__)."/".$this->path."/".self::$dir."/".$fileName))
                {
                    $fileName = strchr(
                        ".",
                        "-",
                        basename(
                            $fileName,
                            $imgExtension
                        )
                    );
                    $fileName = $fileName . Rand::make(4).".". $imgExtension;


                }
                if(move_uploaded_file($fileTemp, dirname(__DIR__)."/". $this->path."/".self::$dir."/". $fileName))
                {
                    array_push($imageNames, $fileName);

                }
            }
        }

        return $imageNames;
    }

    public function extensions(array $ext)
    {
        return $ext;
    }

    public static function dir($dir)
    {
        self::$dir = implode('/', Input::ExplodeDot($dir));
        return self::$dir;
    }

    public function filename($name)
    {
        $this->filename =$name;
        return $this;

    }
    public function path($name)
    {
        $this->path =$name;
        return $this;

    }



}