$('.polaznici').click(function(){

    //  console.log($(this).html().trim());
    //navigator.clipboard.writeText($(this).html().trim());
    let polaznici = $(this).html().trim();
    
    const unsecuredCopyToClipboard = (text) => { 
        const textArea = document.createElement("textarea"); 
        textArea.value=text; 
        document.body.appendChild(textArea); 
        textArea.focus();
        textArea.select(); 
        try{
            document.execCommand('copy')}
            catch(err){
                console.error('Unable to copy to clipboard',err)}
        document.body.removeChild(textArea)};

    /**
     * Copies the text passed as param to the system clipboard
     * Check if using HTTPS and navigator.clipboard is available
     * Then uses standard clipboard API, otherwise uses fallback
    */
    const copyToClipboard = (content) => {
      if (window.isSecureContext && navigator.clipboard) {
        navigator.clipboard.writeText(content);
      } else {
        unsecuredCopyToClipboard(content);
      }
    };

    copyToClipboard(polaznici);
    $(this).attr('title','Sadržaj je kopiran u međuspremnik')

    setTimeout(() => {
        $(this).attr('title','Klik za kopiranje u međuspremnik')
  
    }, 1000);

    return false;
});



