<?php

namespace App\Services;

use App\Jobs\ProcessPushNotification;
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
    if (auth()->user()->getTable() == 'users') {
      ChatMessages::whereNull('user_id')
        ->whereNull('read_at')
        ->where('chat_id', $id)
        ->update(['read_at' => date('Y-m-d H:i:s')]);
    }
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
    if ($is_admin) {
      $user_id = $this->class::find($id)->user_id;
      $request->merge(['user_id' => $user_id, 'send' => 1]);
      ProcessPushNotification::dispatch($request->collect(), [
        'title' => 'Вам пришло новое сообщение',
        'body' => $request->message
      ]);
    }
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
