let time;
function idle(){
    time++;
    if(time == 2){
        location.href = "http://localhost/php/chat-testjson/timeout.php";
        location.reload();
        console.log("test2");
    }
    else{
    document.getElementsByTagName('html')[0].addEventListener("mousemove", timeoutoff);
    }
}

function timeoutoff()
{
    time = 0;
    console.log("ruch");
    idle();
}

function loginhide(){
    const login = document.getElementById('login');
    login.style.visibility="hidden";
    console.log("test");
}

function showinfo(){
    const accountmenu = document.getElementById('accountmenu');
    accountmenu.style.visibility="visible";
}
function hideinfo(){
    const accountmenu = document.getElementById('accountmenu');
    accountmenu.style.visibility="hidden";
}
//Get messages
const chat = document.getElementById('chat');
fetch('./php/getmessagess.php?p=0')
    .then(response => response.json())
    .then(data => {
        console.log(data);
        data.forEach(element => {
            console.log(element.id);
            let wiadomosc = document.createElement('p');
            let tresc = document.createTextNode(element.autor+': '+element.tresc+' ');
            wiadomosc.appendChild(tresc);
            // test.appendChild(wiadomosc)
            chat.appendChild(wiadomosc);
        });
    });

//Send messagess
// const form = document.getElementById('form');
// form.addEventListener("submit",(e)=>{
//     e.preventDefault();
//     data = document.getElementById('usertext').value;
//     fetch('./php/sendmessagess.php', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'text/plain',
//         },
//         title: "text",
//         body: data
//         })
//         .then(res => res.json())
//         .then(data => {
//         // enter you logic when the fetch is successful
//             console.log(data)
//         })
//         .catch(error => {
//         // enter your logic for when there is an error (ex. error toast)
//         console.log(error)
//         })  
// })
