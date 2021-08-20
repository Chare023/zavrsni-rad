var btnComment   = document.getElementById("btn-comment-show");
            var commentList  = document.getElementById("comments");

            btnComment.addEventListener('click', function(){
                if(commentList.style.display !== 'none') {
                    commentList.style.display = 'none';
                    btnComment.innerText = "Show comments"; 
                } else {
                    commentList.style.display = "block";
                    btnComment.innerText = "Hide comments";
                }
            });
// var btn = document.getElementsByClassName("btn");

// var myFunction = function() {
//     var value = this.value;
       
// };

// for (var i = 0; i < btn.length; i++) {
//     btn[i].addEventListener('click', myFunction, false);
// }





// var btnDeletePost = document.getElementById("btn-delete-post");
// btnDeletePost.addEventListener('click', function(){
//     // mysql_query("DELETE FROM posts WHERE id=''");
//     console.log('radi dugme'); 
// });