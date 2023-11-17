import React, { useEffect, useState } from 'react';
import Pusher from 'pusher-js';
import axios from 'axios';
import { MessageBox } from 'react-chat-elements';


function App() {

    const [user, setUser] = useState(null);
    const [users, setUsers] = useState([]);
    const [selectedUser, setSelectedUser] = useState(null);
    const [messages, setMessages] = useState([]);
    const [currentMessage, setCurrentMessage] = useState('');
    const baseUrl = "http://localhost:8000/";

    useEffect(() => {
        // Obtén el usuario actual de la API
        fetch('/api/user')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => setUser(data))
            .catch(error => console.error('There has been a problem with your fetch operation:', error));

        // Obtén los usuarios de la API
        fetch('/api/users')
            .then(response => response.json())
            .then(data => setUsers(data));

    }, []);

    useEffect(() => {

        const pusher = new Pusher('c9024ee14c3db4041923', {
            cluster: 'mt1'
        });

        const channel = pusher.subscribe('chat');

        channel.bind('message', (data) => {
            setMessages(prevMessages => [...prevMessages, data]);
        });

        return () => {
            channel.unbind_all();
            channel.unsubscribe();
        };

    }, []);

    useEffect(() => {
        if (selectedUser) {
            fetch(`/messages/${selectedUser.id}`)
                .then(response => response.json())
                .then(data => {
                    //console.log(data);
                    setMessages(data);
                });
        } else {
            setMessages([]);
        }
    }, [selectedUser]);

    const sendMessage = () => {
        fetch('/send', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({
                from_user_id: user.id,
                to_user_id: selectedUser.id,
                message: currentMessage,
            }),
        })
        .then(response => response.json())
        .then(message => {
            setMessages(prevMessages => [...prevMessages, message]);
            setCurrentMessage('');
        });
    };

    return (
        <div className="flex">
            {/* Panel de usuarios */}
            <div className="w-1/4 border-r border-gray-300 p-4 overflow-auto bg-white">
                <h1 className='text-2xl font-bold text-center mb-2'>Chats</h1>
                {users.map(user => (
                    <div key={user.id} className={`p-2 ${selectedUser && selectedUser.id === user.id ? 'bg-blue-500 text-white' : 'hover:bg-blue-100'}`} onClick={() => setSelectedUser(user)}>
                        {user.name}
                    </div>
                ))}
            </div>

            {/* Panel de chat */}
            {selectedUser && (
                <div className="w-3/4 ">

                    <div className='bg-white h-[50px] flex items-center'>
                        <div className="flex items-center gap-2 px-2">
                            {selectedUser.settings.foto_perfil ? (
                                <img src={`${baseUrl}storage/${selectedUser.settings.foto_perfil}`} className="w-10 h-10 rounded-full mr-2" />
                            ) : (
                                <div className='rounded-full bg-gray-100'>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" className="w-8 h-8 p-1 text-slate-300">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>
                                </div>

                            )}
                            <h2 className="text-2xl font-bold">{selectedUser.name}</h2>
                        </div>
                    </div>


                    {/* Mensajes */}
                    <div className="grow overflow-auto h-[560px] bg-[length:30%] bg-opacity-50" style={{ backgroundImage: `url(${baseUrl}img/chat.png)`, backgroundSize: 'cover' }}>

                        {messages.map((message, index) => (
                            <div key={index} className={`${message.from_user_id === user.id ? 'flex justify-end' : 'flex justify-start'}`}>
                                <div className={`p-2 m-2 rounded shadow ${message.from_user_id === user.id ? 'bg-[#d9fdd3]' : 'bg-white'}`} style={{maxWidth: "80%"}}>
                                    <div>
                                        <div>{message.message}</div>
                                        <div className='text-[0.6rem] text-gray-500'>{message.time_ago}</div>
                                    </div>
                                </div>
                            </div>
                        ))}

                    </div>
                    {/* Input para enviar mensajes */}
                    <div className="border-t border-gray-300 flex items-center">
                    <input
                        type="text"
                        placeholder='Escribe un mensaje'
                        className="w-full rounded border border-gray-200 resize-none p-2 text-sm h-10"
                        value={currentMessage}
                        onChange={e => setCurrentMessage(e.target.value)}
                        onKeyPress={e => {
                            if (e.key === 'Enter') {
                                e.preventDefault();
                                sendMessage();
                            }
                        }}
                    />
                    </div>
                </div>
            )}
        </div>
    )
}

export default App
