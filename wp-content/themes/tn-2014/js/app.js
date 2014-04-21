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

var list = '<% _.each(posts, function(post) { %> <li><a href="<%= post.url %>"><div><img src="<%= post.thumbnail_images["four-column-thumb"].url %>" /><br/><span class="entry-starttime"><%= moment.unix(post.custom_fields._neuf_events_starttime).utc().format("YYYY-MM-DD HH:mm") %></span><br/> <%= post.title %> (<%= post.custom_fields._neuf_events_price_regular %>/<%= post.custom_fields._neuf_events_price_member %>)</div></a></li> <% }); %>';
jQuery(document).ready(function() {
    var $ = jQuery;
    $.getJSON(
        program_endpoint+"?callback=?",
        query_params,
        function(data) {
            if(data && data.posts) {
                // render template
                console.log(data);
                var html = _.template(list, {
                    posts: data.posts.slice(0, 4)}
                );
                $(".program-upcoming ul.program-list").html(html);
            }
        }
    );
});
