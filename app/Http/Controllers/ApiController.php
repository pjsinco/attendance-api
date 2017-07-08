<?php

namespace App\Http\Controllers;

class ApiController extends Controller
{

  /**
   * @var int
   *
   */
  protected $statusCode = 200;

  public function setStatusCode($code)
  {
    $this->statusCode = $code;
  }

  public function getStatusCode()
  {
    return $this->statusCode;
  } 

  public function respond($data = [], $errors = [])
  {
    return response()->json([
      'data' => $data,
      'errors' => $errors,
    ], $this->getStatusCode());

  }

  private function respondWithError($message)
  {
    return $this->respond([], [
      'message' => $message,
      'status_code' => $this->getStatusCode(),
    ]);
  }

  public function respondNotFound($message = 'Not found')
  {
    $this->setStatusCode(404);
    return $this->respondWithError($message);
  }

}
