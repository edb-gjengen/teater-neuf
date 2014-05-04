var program_endpoint = "https://studentersamfundet.no/api/get_type_event/";
var custom_fields = [
    "_neuf_events_starttime",
    "_neuf_events_endtime",
    "_neuf_events_price_regular",
    "_neuf_events_price_member"];
var query_params = {
    json: '1',
    post_type: 'event',
    type: 'teater', // TODO not implemented
    order_by: '_neuf_events_starttime',
    custom_fields: custom_fields.join()
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
        html += post.title +'('+ post.custom_fields._neuf_events_price_regular +')/'+ post.custom_fields._neuf_events_price_member +')</div></a></li>';
    }
    return html;
}

jQuery(document).ready(function() {
    var $ = jQuery;
    $.getJSON(
        program_endpoint+"?callback=?",
        query_params,
        function(data) {
            if(data && data.posts) {
                console.log(data);
                // render template
                var html = format_posts(data.posts.slice(0, 4));
                $(".program-upcoming ul.program-list").html(html);
            }
        }
    );
});
