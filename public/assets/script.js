function blocksourcecode(event){
    if(event.keyCode == 123 || (event.ctrlKey && event.shiftKey && event.keyCode == 73) || (event.ctrlKey && event.keyCode == 85) ){
        event.preventDefault();
        
    }
}
document.addEventListener('keydown',blocksourcecode);
document.addEventListener('contextmenu',event=>event.preventDefault());