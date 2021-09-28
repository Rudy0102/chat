//Get messages
window.onload = ()=>{
    getMessages();
    setInterval(()=>{
            getMessages();
    },5000)};
function getMessages(){
    const chat = document.getElementById('chat');
    let messagess =  document.getElementsByClassName('chatmessage');
    const number = messagess.length;
    if (messagess.length > 0){
        for (let i = 0; i < number; i++) {
            messagess[0].remove();
        }
    }
    fetch('./php/getmessagess.php?p=0')
        .then(response => response.json())
        .then(data => {
            // console.log(data);
            data.forEach(element => {
                let wiadomosc = document.createElement('p');
                let tresc = document.createTextNode(element.autor+': '+element.tresc+' ');
                wiadomosc.appendChild(tresc);
                wiadomosc.classList.add("chatmessage");
                chat.appendChild(wiadomosc);
            });
            chat.scrollIntoView(false);
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
            // console.log(this.responseText);
            getMessages();
            // usertext.innerHTML=" ";
        }
    };
    xhttp.open("POST", "./php/sendmessagess.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("usertext="+usertext.value);
};
function showinfo(){
    const accountmenu = document.getElementById('accountmenu');
    accountmenu.style.visibility="visible";
}
function hideinfo(){
    const accountmenu = document.getElementById('accountmenu');
    accountmenu.style.visibility="hidden";
}
function loginhide(){
    const login = document.getElementById('login');
    login.style.visibility="hidden";
    console.log("test");
}
