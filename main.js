//Get messages
window.onload = getMessages;
function getMessages(){
    const chat = document.getElementById('chat');
    fetch('./php/getmessagess.php?p=0')
        .then(response => response.json())
        .then(data => {
            // console.log(data);
            data.forEach(element => {
                let wiadomosc = document.createElement('p');
                let tresc = document.createTextNode(element.autor+': '+element.tresc+' ');
                wiadomosc.appendChild(tresc);
                chat.appendChild(wiadomosc);
            });
        });
};
//Send messagess
const form = document.getElementById("form");
form.addEventListener("submit",(event)=>{
    event.preventDefault();
    sendMessage();
    getMessages();
})
function sendMessage(){
    const usertext = document.getElementById('usertext');
    //Obj of data to send in future like a dummyDb
    const data = { message: usertext};
    //POST request with body equal on data in JSON format
    fetch('./php/sendmessagess.php', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
    },
    body: JSON.stringify(data),
    })
    .then((response) => response.json())
    //Then with the data from the response in JSON...
    .then((data) => {
    console.log('Success:', data);
    })
    //Then with the error genereted...
    .catch((error) => {
    console.error('Error:', error);
    });
};

