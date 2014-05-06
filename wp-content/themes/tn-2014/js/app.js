var program_endpoint = "https://studentersamfundet.no/api/events/get_upcoming/";
var query_params = {
    event_type: 'teater'
};

function format_posts(posts) {
    var html = '';
    for(var i=0; i< posts.length; i++) {
        var post = posts[i];
        html += '<li><a href="'+ post.url +'"><div>';
        if(post.thumbnail_images) {
            html += '<img src="'+ post.thumbnail_images["four-column-thumb"].url +'" /><br/>';
        } else {
            var stylesheet_dir = jQuery("meta[name=x-stylesheet-directory]").attr('content');
            html += '<img src="'+ stylesheet_dir +'/img/placeholder.gif" /><br/>';
        }
        html += '<span class="entry-starttime">'+ moment.unix(post.custom_fields._neuf_events_starttime).utc().format("YYYY-MM-DD HH:mm") +'</span><br/>';
        html += post.title +'</div></a></li>';
    }
    return html;
}

jQuery(document).ready(function() {
    var $ = jQuery;
    $.getJSON(
        program_endpoint+"?callback=?",
        query_params,
        function(data) {
            if(data && data.events) {
                console.log(data);
                // render template
                var html = format_posts(data.events.slice(0, 4));
                $(".program-upcoming ul.program-list").html(html);
            }
        }
    );
});
