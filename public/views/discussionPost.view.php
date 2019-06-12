<!DOCTYPE html>
<html lang="en">
    <?php require 'inc/head.view.php'; //HEAD ?>
    <body>
        <?php include 'inc/navbar.view.php'; //NAVBAR ?>
        
        <div class="container">
            <div class="container__mod--1">
                <?php include 'inc/sidenav.view.php'; //SIDENAV ?>
            </div>
            <div class="container__mod--2">
                <?php include 'inc/userarea.view.php'; //USERAREA ?>
            </div>
            <div class="container__mod--3">
                <main>
                    <section class="forumPostBox">
                        <h1 class="forumPostBox__title"><?= htmlspecialchars_decode($forumPost->postTitle); ?></h1>
                        <p class="forumPostBox__author">
                            <img class="forumPostBox__author--image" src="data:image/png;base64,<?= base64_encode($forumPost->profileImage); ?>"/> 
                            <span><b><?= $forumPost->postOwner; ?></b> <i>says:</i></span>
                        </p>
                        <div class="forumPostBox__content">
                            <?= htmlspecialchars_decode($forumPost->postContent); ?>
                        </div>
                        <p class="forumPostBox__postcat">
                            <?= $forumPost->postCat; ?>
                        </p>
                        <div class="forumPostBox__menuItems">
                            <span class="forumPostBox__menuItem"><i class="fa fa-flag forumPostBox__icon forumPostBox__icon--report report-icon" data-type="1" data-id="<?= $forumPost->postId; ?>" title="Report"></i></span>
                        </div>
                    </section>
                    <?php if(isset($uid)): ?>
                    <section class="postReplyBox">
                        <form>
                            <h2><i class="fa fa-reply"></i> Reply</h2>
                            <div class="fgrp">
                                <textarea class="textarea" name="postReplyText" id="postReplyText"></textarea>
                            </div>
                            <div class="errbox"></div>
                            <button type="submit" id="subbut" class="btn btn--primary">Send</button>
                        </form>
                    </section>
                    <?php endif; ?>

                    <section class="postCommentsSection">
                        <?php 
                        if($postReplies): 
                        foreach($postReplies as $reply):
                        ?>
                        <div class="postComment">
                            <p class="postComment__author">
                                <img class="postComment__author--image" src="data:image/png;base64,<?= base64_encode($reply->profileImage); ?>"/>
                                <span><?= $reply->owner; ?></span>
                            </p>
                            <div class="postComment__content">
                                <?= htmlspecialchars_decode($reply->content); ?>
                            </div>
                            <div class="postComment__menu">
                                <span class="postComment__menuitem"><i class="fa fa-flag postComment__icon postComment__icon--report report-icon" data-type="2" data-id="<?= $reply->replyId; ?>" title="Report"></i></span>
                                <span <?php if(isset($uid)){if($likesAndDislikes->checkIfReplyLikeExists($uid, $reply->replyId)){echo 'data-voted="true"'; }else{ echo 'data-voted="false"';}} ?>>
                                    <span class="postComment__menuitem"><i class="fa fa-thumbs-up postComment__icon postComment__icon--upvote vote-up-icon" title="Vote Up" data-type="2" data-val="1" data-id="<?= $reply->replyId; ?>"></i> <?= $likesAndDislikes->getReplyLikes($reply->replyId)->likes; ?></span>
                                    <span class="postComment__menuitem"><i class="fa fa-thumbs-down postComment__icon postComment__icon--downvote vote-down-icon" title="Vote Down" data-type="2" data-val="0" data-id="<?= $reply->replyId; ?>"></i> <?= $likesAndDislikes->getReplyDislikes($reply->replyId)->dislikes; ?></span>
                                </span>
                            </div>
                        </div>
                        <?php 
                        endforeach;
                        else:
                        ?>
                            <p>No replies yet...be the first to reply!</p>
                        <?php endif; ?>
                    </section>
                </main>
            </div>
            <div class="container__mod--4">...</div>
        </div>

        <div class="reportModal">
            <div class="reportModal__main">
                <i class="fa fa-window-close reportModal__closeBtn"></i>
                <h2>Report</h2>
                <div class="reportModal__content">
                    <form class="reportModal__form">
                        <div class="fgrp">
                            <label for="report-reason">Reason</label>
                            <select name="report-reason" id="report-reason" class="select-input">
                                <option value="">--SELECT--</option>
                                <option value="1">Threatening or Harassing</option>
                                <option value="2">Nonsense</option>
                                <option value="3">Duplicate Post</option>
                                <option value="4">Illegal Activity</option>
                                <option value="5">Spam</option>
                            </select>
                        </div>
                        <div class="fgrp">
                            <label for="report-comments">Comments (optional)</label>
                            <textarea name="report-comments" id="report-comments" class="textarea"></textarea>
                        </div>
                        <input type="hidden" name="report-type" id="report-type" value=""/>
                        <input type="hidden" name="report-id" id="report-id" value=""/>
                        <div class="fgrp">
                            <button id="reportsubbut" class="btn btn--primary">Submit</button>
                        </div>
                        <div class="reporterrbox">

                        </div>
                    </form>
                    <div class="reportModal__response hide">


                    </div>
                </div>
            </div>
        </div>

        <div class="notSignedInModal">
            <div class="notSignedInModal__main">
                <i class="fa fa-window-close notSignedInModal__closeBtn"></i>
                <div class="notSignedInModal__content">
                    <h2>Sign In or Register</h2>
                    <p>Please sign in or register to perform this action.</p>
                </div>
            </div>
        </div>

        <!-- Scripts -->
        <script src="assets/scripts/toggleNav.js"></script>
        <script src="assets/scripts/toggleSidenav.js"></script>
        <script src="assets/scripts/toggleUserArea.js"></script>
        <script src="assets/scripts/Helpers.js"></script>
        <script src="assets/tinymce/js/tinymce/tinymce.min.js"></script>
        <script>
            tinymce.init({
                selector : '#postReplyText', 
                menubar: false,
                plugins : 'link',
                toolbar : 'bold italic underline strikethrough | link'
            });

            var signedIn; 

            <?php if(isset($uid)): ?>
                signedIn = true;
            <?php else: ?>
                signedIn = false;
            <?php endif; ?>


            function addLikeDislike(e){

                if(!signedIn){
                        document.querySelector('.notSignedInModal').classList.add('show');
                    } else {

                        if(e.target.parentNode.parentNode.dataset.voted === 'false'){

                            var fd = new FormData();
                            fd.append('type',e.target.dataset.type); 
                            fd.append('id',e.target.dataset.id);
                            fd.append('value',e.target.dataset.val);

                            var xhr = new XMLHttpRequest(); 
                            xhr.onreadystatechange = function(){

                                if(this.status == 200 && this.readyState == 4){
                                getNewReplies();
                                }
                            }
                            xhr.open('POST','../proc/processlikesdislikes.php'); 
                            xhr.send(fd);
                            
                        }

                    }



            }


            document.querySelectorAll('.vote-up-icon').forEach(function(item){

                item.addEventListener('click',function(e){
                        addLikeDislike(e);
                });

            });

            document.querySelectorAll('.vote-down-icon').forEach(function(item){

                item.addEventListener('click',function(e){
                        addLikeDislike(e);
                });

            });


            var reportModalForm = document.querySelector('.reportModal__form');
            var reportModalResponse = document.querySelector('.reportModal__response');

            document.querySelector('#reportsubbut').addEventListener('click',function(e){
                e.preventDefault();

                var errs = 0; 
                var errmsgs = [];
                var errbox = document.querySelector('.reporterrbox');
                var fields = {
                    reason : document.querySelector('#report-reason'),
                    comments : document.querySelector('#report-comments'), 
                    type : document.querySelector('#report-type'), 
                    id : document.querySelector('#report-id')
                }
                if(fields.reason.value === ""){
                    errs++;
                    errmsgs.push('<p>Please select a reason</p>');
                }
                if(errs){


                } else {

                    var fd = new FormData();
                    for(var i in fields){
                        fd.append(i, fields[i].value);
                    }

                    var xhr = new XMLHttpRequest(); 
                    xhr.onreadystatechange = function(){
                        if(this.status == 200 && this.readyState == 4){
                            var resp = JSON.parse(this.response);
                        
                            reportModalForm.reset();
                            reportModalForm.classList.add('hide');
                            reportModalResponse.classList.remove('hide');
                            reportModalResponse.innerHTML = resp.msg;
                        }
                    }
                    xhr.open('POST','../proc/processReport.php'); 
                    xhr.send(fd);

                }

            });

            function toggleReportModal(){

                document.querySelector('.reportModal').classList.toggle('show');
                reportModalForm.reset();
                reportModalForm.classList.remove('hide');
                reportModalResponse.classList.add('hide');
                reportModalResponse.innerHTML = '';


            }

            document.querySelector('.reportModal__closeBtn').addEventListener('click',toggleReportModal);

            function reportIconsInit(){

            document.querySelectorAll('.report-icon').forEach(function(item){

                item.addEventListener('click',function(e){

                    var id = e.target.dataset.id;
                    var type = e.target.dataset.type;

                    document.querySelector('#report-id').value = id;
                    document.querySelector('#report-type').value = id;

                    toggleReportModal();

                    
                });


            });

            }



            function getNewReplies(){

                var commentArea = document.querySelector('.postCommentsSection'); 
                commentArea.innerHTML = '';

                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function(){

                    if(this.status == 200 && this.readyState == 4){

                        var resp = JSON.parse(this.response);
                        
                        if(resp.errors){
                            console.log(errors);
                        }else{
                            for(item of resp){
                                var postComment = document.createElement('div');
                                postComment.className = 'postComment';
                                var postCommentAuthor = document.createElement('p');
                                postCommentAuthor.className = 'postComment__author';
                                var postCommentContent = document.createElement('div');
                                postCommentContent.className = 'postComment__content';
                                postCommentAuthor.innerHTML = '<img class="postComment__author--image" src="data:image/png;base64,'+ item.profileImage +'"/> <span>' + item.owner + '</span>';
                                postCommentContent.innerHTML = item.content;
                                var postCommentMenu = document.createElement('div');
                                postCommentMenu.className = 'postComment__menu';
                                var postCommentMenuItem_flag = document.createElement('span');
                                postCommentMenuItem_flag.className = 'postComment__menuitem';
                                var flagIcon = document.createElement('i');
                                flagIcon.classList.add('fa');
                                flagIcon.classList.add('fa-flag');
                                flagIcon.classList.add('postComment__icon');
                                flagIcon.classList.add('postComment__icon--report');
                                flagIcon.classList.add('report-icon');
                                flagIcon.setAttribute('data-type',2); 
                                flagIcon.setAttribute('data-id',item.replyId);
                                flagIcon.setAttribute('title','Report');
                                postCommentMenuItem_flag.appendChild(flagIcon);
                                postCommentMenu.appendChild(postCommentMenuItem_flag);
                                var likeDislikeContainer = document.createElement('span');
                                var postCommentMenuItem_thumbsup = document.createElement('span');
                                postCommentMenuItem_thumbsup.className = 'postComment__menuitem';
                                var thumbsUp = document.createElement('i');
                                thumbsUp.classList.add('fa');
                                thumbsUp.classList.add('fa-thumbs-up');
                                thumbsUp.classList.add('postComment__icon');
                                thumbsUp.classList.add('postComment__icon--upvote');
                                thumbsUp.classList.add('vote-up-icon');
                                thumbsUp.setAttribute('data-type','2');
                                thumbsUp.setAttribute('data-val','1');
                                thumbsUp.setAttribute('data-id',item.replyId);
                                postCommentMenu.appendChild(likeDislikeContainer);
                                likeDislikeContainer.appendChild(postCommentMenuItem_thumbsup);
                                postCommentMenuItem_thumbsup.appendChild(thumbsUp);
                                postCommentMenuItem_thumbsup.insertAdjacentText('beforeend', ' ' + item.likes);
                                var postCommentMenuItem_thumbsdown = document.createElement('span');
                                postCommentMenuItem_thumbsdown.className = 'postComment__menuitem';
                                var thumbsDown = document.createElement('i');
                                thumbsDown.classList.add('fa');
                                thumbsDown.classList.add('fa-thumbs-down');
                                thumbsDown.classList.add('postComment__icon');
                                thumbsDown.classList.add('postComment__icon--downvote');
                                thumbsDown.classList.add('thumbs-down-icon');
                                thumbsDown.setAttribute('data-type','2');
                                thumbsDown.setAttribute('data-val','0');
                                thumbsDown.setAttribute('data-id',item.replyId);
                                likeDislikeContainer.appendChild(postCommentMenuItem_thumbsdown);
                                postCommentMenuItem_thumbsdown.appendChild(thumbsDown);
                                postCommentMenuItem_thumbsdown.insertAdjacentText('beforeend', ' ' + item.dislikes);

                                postComment.appendChild(postCommentAuthor);
                                postComment.appendChild(postCommentContent);
                                postComment.appendChild(postCommentMenu);

                                commentArea.appendChild(postComment);

                            }

                            reportIconsInit();
                        }

                    }


                }
                xhr.open('GET','../proc/getForumReplies.php?postId=<?= $forumPost->postId; ?>');
                xhr.send();

            }




            document.querySelector('#subbut').addEventListener('click',function(e){
                e.preventDefault();

                var errs = 0;
                var errmsgs = [];
                var errbox = document.querySelector('.errbox');
                errbox.innerHTML = '';
                var replyText = tinymce.get('postReplyText').getContent();

                if(Helpers.stripTags(Helpers.strip_nbsp(replyText)).length < 50){
                    errmsgs.push('<p><i class="fa fa-exclamation-triangle"></i> Your reply is to short.</p>');
                    errs++;
                }

                if(errs){
                    for(let i = 0; i < errmsgs.length; i++){
                        errbox.insertAdjacentHTML('beforeend',errmsgs[i]);
                    }
                }else{
                    var fd = new FormData();
                    fd.append('replyText',replyText);
                    fd.append('postId',<?= $forumPost->postId; ?>);
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function(){
                        var resp = this.responseText;

                        if(this.status == 200 && this.readyState == 4){
                            getNewReplies();
                        }

                    }
                    xhr.open('POST','../proc/processNewReply.php');
                    xhr.send(fd);
                }
                
            });

            reportIconsInit();
        </script>
    </body>
</html>