<?php
namespace App\Exceptions;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Http\Response;

trait ExceptionTrait{
    public function apiException($request, $e){
        if($this->isModel($e)){
            return $this->ModelResponse($e);
        }
        if($this->isHttp($e)){
            return $this->HttpResponse($e);
        }
        return parent::render($request, $e);
    }
    public function isModel($e){
        return $e instanceof ModelNotFoundException;
    }
    public function isHttp($e){
        return $e instanceof NotFoundHttpException;
    }
    public function ModelResponse($e){
        return response()->json(["data"=>"Model Not found"],Response::HTTP_NOT_FOUND);
    }
    public function HttpResponse($e){
        return response()->json(["data"=>"Incorrect Route"],Response::HTTP_NOT_FOUND);
    }
}
