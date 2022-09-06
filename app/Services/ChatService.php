<?php

namespace App\Services;

use App\Models\Chat;
use App\Models\ChatMessages;
use App\Services\Contracts\ChatServiceInterface;

class ChatService implements ChatServiceInterface
{
  public $class;
  public $request;
  public function __construct()
  {
    $this->class = Chat::class;
    $this->request = request();
  }
  public function messages($id = null)
  {
    $id = $this->getID($id);
    return ChatMessages::with(['user', 'admin_user'])->where('chat_id', $id)->get();
  }
  public function message($request, $id = null, $is_admin = false)
  {
    $id = $this->getID($id);
    $user = $is_admin ? ['admin_user_id' => auth()->guard('admin')->id()] : ['user_id' => auth()->id()];
    $model = ChatMessages::create(
      array_merge(
        [
          'chat_id' => $id,
          'message' => $request->message,
          'video' => uploadFile($request->file('video'), 'chat'),
          'photo' => uploadFile($request->file('photo'), 'chat'),
          'file' => uploadFile($request->file('file'), 'chat'),
        ],
        $user
      )
    );
    return $model;
  }

  private function getID($id, $user_id = null)
  {
    if ($user_id == null) {
      $user_id = auth()->id();
    }
    if ($id == null) {
      $id = $this->class::firstOrCreate(['user_id' => $user_id])->id;
    }
    return $id;
  }
}
