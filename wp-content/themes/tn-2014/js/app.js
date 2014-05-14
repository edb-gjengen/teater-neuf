var program_endpoint = "https://studentersamfundet.no/api/events/get_upcoming/";
var query_params = {
    event_type: 'teater'
};

function format_posts(posts) {
    var html = '';

    if(posts.length === 0) {
        return '<p class="no-posts">Finner ingen fremtidige, men se gjerne hva vi har <a href="https://studentersamfundet.no/konsept/teater/#past">arrangert tidligere</a>.</p>';
    }

    html += '<ul class="program-list">';
    for(var i=0; i< posts.length; i++) {
        var post = posts[i];
        html += '<li><a href="'+ post.url +'"><div>';
        if(post.thumbnail_images) {
            html += '<img src="'+ post.thumbnail_images["four-column-thumb"].url +'" /><br/>';
        } else {
            var stylesheet_dir = jQuery("meta[name=x-stylesheet-directory]").attr('content');
            html += '<img src="'+ stylesheet_dir +'/img/placeholder.gif" /><br/>';
        }
        html += '<span class="entry-starttime">'+ moment.unix(post.custom_fields._neuf_events_starttime).utc().format("DD. MMMM YYYY, HH.mm") +'</span><br/>';
        html += '<span class="entry-title">'+ post.title +'</span></div></a></li>';
    }
    html += '</ul>';

    return html;
}

jQuery(document).ready(function() {
    moment.lang("nb");

    var $ = jQuery;
    $.getJSON(
        program_endpoint+"?callback=?",
        query_params,
        function(data) {
            if(data && data.events) {
                //console.log(data);
                // render template
                var html = format_posts(data.events.slice(0, 4));
                $(".program-upcoming .program-list-wrap").html(html);
            }
        }
    );
});
