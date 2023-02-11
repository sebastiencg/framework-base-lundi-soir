<?php

namespace App;

class UploadFile
{
    private $nameImage;
    private $image;

    private $nomFichier;
    private $typeFichier;
    private $tailleFichier;
    public function __construct($photo){


        if(!empty($photo)){

            $this->image=$_FILES[$photo];

            $this->nomFichier=$this->image["name"];

            $this->typeFichier=$this->image["type"];
            $this->tailleFichier=$this->image["size"];
            $maxsize=3*1024*1024;
            $formatAccepte=array(
                "png"=>"image/png",
                "jpg"=>"image/jpg",
                "jpeg"=>"image.jpeg"
            );

            $ext=pathinfo($this->nomFichier, PATHINFO_EXTENSION);

            if(array_key_exists($ext,$formatAccepte)){
                if($this->tailleFichier<$maxsize){
                    if(!in_array($this->nomFichier,$formatAccepte)){
                        $randomName=bin2hex(random_bytes(20));
                        $this->nameImage="$randomName.$ext";
                        move_uploaded_file($this->image["tmp_name"],"images/".$this->nameImage);
                    }
                    else{
                        die("mauvais format");
                    }
                }
                else{
                    die(" erreur fichier est trop lourd moin de 3 Mo PLS");
                }
            }
            else{
                die(" erreur de format");
            }
        }
        else{
            echo "probleme";
        }

    }

    public function upload( )
    {

        return $this->nameImage;
    }



}