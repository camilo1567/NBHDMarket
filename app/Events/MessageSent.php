<?php

namespace App\Events;

use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message; // Agrega esta propiedad

    /**
     * Create a new event instance.
     */
    public function __construct(Message $message) // Cambia los parámetros aquí
    {
        $this->message = $message; // Asigna el mensaje aquí
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn()
    {
        return ['chat'];
    }

    /**
     * Get the data to broadcast.
     *
     * @return array
     */
    public function broadcastWith()
    {
        return [
            'from' => $this->message->fromUser->name, // Usa la relación del mensaje aquí
            'message' => $this->message->message,
            'to' => $this->message->toUser->name, // Usa la relación del mensaje aquí
        ];
    }
}
