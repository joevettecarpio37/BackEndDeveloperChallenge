
 $(".search").click(function (ev) {
    ev.preventDefault();
    alert('');
});


function load_news_feeds() {
    $.ajax({
        url: "/twitter/search?q="+$('.description').val(),
        type: "GET",
        dataType: "json",
        success: function (result) {
            var array = JSON.parse(result);
            var vhtml = "";
            var slist = "";
            array.forEach(function (key, i) {
                vhtml += "<div class='social-feed-box'>";
                vhtml += "<div class='pull-right social-action dropdown'>";
                vhtml += "<button data-toggle='dropdown' class='dropdown-toggle btn-white'>";
                vhtml += "<i class='fa fa-angle-down'></i>";
                vhtml += "</button>";
                vhtml += "<ul class='dropdown-menu m-t-xs'>";
                //vhtml += "<li><a href='#'><i class='fa fa-minus'></i> Hide Post</a></li>";
                vhtml += "<li><a href='#'><i class='fa fa-times'></i> Delete Post</a></li>";
                vhtml += "</ul>";
                vhtml += "</div>";
                vhtml += "<div class='social-avatar'>";
                vhtml += "<a href='' class='pull-left'>";
                vhtml += "<img alt='image' src='" + array[i].profile_background_image_url + "'>";
                vhtml += "</a>";
                vhtml += "<div class='media-body'>";
                vhtml += "<a href='#'>";
                vhtml += array[i].screen_name;
                vhtml += "</a>";
                vhtml += "<small class='text-muted'>" + array[i].id_str + " - " + array[i].created_at + "</small>";
                vhtml += "</div>";
                vhtml += "</div>";
                vhtml += "<div class='social-body'>";
                vhtml += "<p>" + array[i].text + "</p>";
                vhtml += "<div id=img_" + array[i].id + "></div>"
                vhtml += "<div class='btn-group'>";
                vhtml += "<button class='btn " + array[i].listed_count + " btn-xs like' id='" + array[i].id + "' ><i class='fa fa-thumbs-up'></i> " + array[i].like_text + "</button>";
                vhtml += "<button class='btn btn-white btn-xs comment' id='" + array[i].id + "'><i class='fa fa-comments'></i> Comment</button>";
                vhtml += "</div>";
                vhtml += "</div>";
                vhtml += "<div class='social-footer'>";
                vhtml += "<div class='comment-list-" + array[i].id + "'></div>";
                vhtml += "<div class='social-comment'>";
                vhtml += "<a href='' class='pull-left'>";
                vhtml += "<img alt='image' src='" + $("#hdn_image").val() + "'>";
                vhtml += "</a>";
                vhtml += "<div class='media-body' id='div_" + array[i].id + "'>";
                vhtml += "<textarea id='" + array[i].sf_id + "' class='form-control comment-" + array[i].sf_id + "' onkeypress='process(event, this)'  placeholder='Write comment...'></textarea>";
                vhtml += "</div>";
                vhtml += "</div>";
                vhtml += "</div>";
                vhtml += "</div>";
                slist += array[i].id + ",";
               
            });
            $(".post-list").append(vhtml);

           

           
        },
        error: function (errormessage) {
            console.log(errormessage.responseText);
        }
    });
}