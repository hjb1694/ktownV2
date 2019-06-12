document.querySelector('#subbut').addEventListener('click',function(e){
    e.preventDefault();
    var errs = 0;
    var errbox = document.querySelector('.errbox');
    errbox.innerHTML = '';
    var errmsgs = [];
    var fields = {
        title : document.querySelector('#postTitle'), 
        content : tinymce.get('postContent').getContent(), 
        category : document.querySelector('#postCategory')
    }

    if(Helpers.strip_nbsp(Helpers.stripTags(fields.content)).length < 75){
        errs++;
        errmsgs.push('Post content is too short.');
    };

    if(fields.title.value.trim().length < 15){
        errs++;
        errmsgs.push('Post title is too short.');
    }
    if(fields.category.value === ""){
        errs++;
        errmsgs.push('Please select a category.');
    }

    if(!errs){
    
    var fd = new FormData();
    fd.append('postTitle', fields.title.value);
    fd.append('postContent', fields.content);
    fd.append('postCategory',fields.category.value);

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){

        var resp = this.responseText;

        if(resp == 1){
            errbox.innerHTML = '<p><i class="fas fa-exclamation-triangle"></i> There was an issue processing your request.</p>';
        }else{
            window.location.href = "discussionsMain.php";
        }

    }
    xhr.open('POST','../proc/processNewPost.php');
    xhr.send(fd);
    } else {
        for(var i = 0; i < errmsgs.length; i++){
            errbox.insertAdjacentHTML('beforeend','<p><i class="fas fa-exclamation-triangle"></i> '+ errmsgs[i] +'</p>');
        }
    }
    
});