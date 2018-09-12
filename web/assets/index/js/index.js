// let box=document.querySelector('#main');
// let envelope=document.querySelector('.abs-l');
// let popup=document.querySelector('.popup');
// let icon=document.querySelector('.msg-box2')
// envelope.onclick=function(e){
//     let cart=document.createElement('div');
//     cart.className='carts';
//     cart.style.width='100%';
//     cart.style.height='50rem';
//     document.body.appendChild(cart);
//     popup.style.display='block';
//     icon.style.display='none';
// }
// let close=document.querySelector('.closes');
// close.onclick=function(e){
//     popup.style.display='none';
//     document.body.removeChild(document.querySelector('.carts'));
// }




let btn=document.querySelector('.refresh-btn');
let article=document.querySelector('.article');
let index=function(){
    btn.onclick=function (){
        btn.classList.add('b');
        article.style.display='block'
    };
    btn.classList.remove('b');
    article.style.display='none';
};
index();
setInterval(function () {
    clearInterval();
    index()
},2500);