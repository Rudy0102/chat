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
})
function sendMessage(){
    const usertext = document.getElementById('usertext');
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            getMessages();
            // usertext.innerHTML=" ";
        }
    };
    xhttp.open("POST", "./php/sendmessagess.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("$usertext="+usertext.value);
};

