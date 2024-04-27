// initialize Category Label: #category_info data-label
// Get Post article holder: content
// Get some Post from API

var category;
var base_url;
var icon_class = "fa fa-credit-card";

$( document ).ready(function() {
  	category = $("#category-info").attr("data-label");
  	base_url = $("#category-info").attr("data-base-url");

//  	console.log(category);
//  	console.log(base_url);
		if(category == "sms"){
			icon_class = "fa fa-comment";
		}else if(category == "third"){
			icon_class = "fa fa-users";
		}

  	// Post Add Events
  	$("body").on("click", "#new-box button:first", function(){
  	//	console.log("clicked!!!");

  		// Toggle View
  		$(this).css("display","none");
  		$(this).next().css("display","block");
  		var txtbox = $(this).next().find("input[type=text]");
  		txtbox.focus();


  	});

  	// Post Cancel Events
  	$("body").on("click", "#new-box .cancel-post", function(){
  	//	console.log("clicked!!!");

  		// Toggle View
  		let add_post_but = $("#new-box button:first");
  		add_post_but.css("display","block");
  		add_post_but.next().css("display","none");

  	});
  	// Post Submit Events
//  	$("body").on("click", ".new-story button", function(e){
	$("body").on("submit", "form#new-story", function(e){
  		e.preventDefault();
  	//	console.log("clicked!!!");
  		// Get Message and Submit

  		var txtinput = $(this).find("input[type=text]");
  		var txtarea = $(this).find("textarea");
  		var fileinput = $(this).find("input[type=file]");
  		var button = $(this).find("button");
  		var message = txtarea.val();

  		var fd = new FormData(this);

  		txtinput.attr("disabled","disabled");
  		txtarea.attr("disabled","disabled");
  		fileinput.attr("disabled","disabled");
  		button.attr("disabled","disabled");

/*        var files = $('#file_upload')[0].files[0];
        console.log(files);
        console.log(message);
        fd.append('message', message);
        fd.append('file', files);	
        console.log(fd);*/
        addPost(fd, $(this));

  	});

	$("content").html("");

	getPosts("");


	// Comment Add Events
	$("body").on("click", ".comment_button", function(){
		var txtinput = $(this).parent().prev().children("textarea");
		var message = txtinput.val();
		if(message != ""){
			// Add Comment
			txtinput.attr("disabled","disabled");
			var parent = $(this).parent().parent().parent();
			var post_id = parent.parents().eq(4).attr("data-id");
			var comments_box = parent.prev().find(".comments-thread-content");

//			console.log(post_id);

			addComment(post_id, message, txtinput, comments_box)
		}
		
	});

	// Search Posts
	$("body").on("click", "#search-box button", function(){
		var searchbox = $("#search-box input[type=text]");
		var needle = searchbox.val();
		if(needle != ""){

			searchbox.attr("disabled","disabled");
			$(this).attr("disabled","disabled");

			searchPost(needle, "");
		}
	});

	// Load Comments
	$("body").on("click", ".comments-summary span", function(){
		if($(this).text() != "No comments have been added"){
			var post_comments = $(this).parent().parent();
			var post_id = $(this).parents().eq(5).attr("data-id");

		//	console.log("Comments posst_id" + post_id);
			getComments(post_id, "", post_comments.find(".comments-thread-content"));
			$(this).css("display","none");
		}

	});

});

function addPost(form_data, form){
	$.ajax({
          method: "POST",
          url: base_url+"Api/Api/post_create",
          dataType: "json",
          data: form_data,
          cache: false,
	      contentType: false,
	      processData: false
      })
      .done(function( msg ) {
//        console.log( "Done addPost: " + msg );

        var txtinput 	= form.find("input[type=text]");
	  		var txtarea 	= form.find("textarea");
	  		var fileinput 	= form.find("input[type=file]");
	  		var button 		= form.find("button");

        if(msg !== false){
        	$("content").prepend(makeAPost(msg) );
        	txtinput.val("");
	    		txtarea.val("");
	    		fileinput.val("");
				}
        	
	    		txtinput.removeAttr("disabled");
	    		txtarea.removeAttr("disabled");
	    		fileinput.removeAttr("disabled").val("");
	    		button.removeAttr("disabled");
        
      })
      .fail(function( jqXHR, textStatus ) {
        console.log( "Request failed: " + textStatus );

        var txtinput 	= form.find("input[type=text]");
	  		var txtarea 	= form.find("textarea");
	  		var fileinput 	= form.find("input[type=file]");
	  		var button 		= form.find("button");
				txtinput.removeAttr("disabled");
				txtarea.removeAttr("disabled");
				fileinput.removeAttr("disabled");
				button.removeAttr("disabled");
      });
}
function getPosts(limit){
      $.ajax({
          method: "GET",
          url: base_url+"Api/Api/posts",
          dataType: "json",
          contentType: "application/json; charset=utf-8",
          data: { category: category, limit: limit },
          cache: false
      })
      .done(function( msg ) {
//        console.log( "Done: " + msg );
        if(msg !== false){
        	displayPosts(msg);

        	$("article").each(function() {
		//		console.log($( this ));
				var post_id = $( this ).attr("data-id");
		//		console.log("post_id" + post_id);
			  	getCommentsSummary(post_id);
			});

        }
      })
      .fail(function( jqXHR, textStatus ) {
        console.log( "Request failed: " + textStatus );
      });
}
function searchPost(needle, limit){
      $.ajax({
          method: "GET",
          url: base_url+"Api/Api/posts_search",
          dataType: "json",
          contentType: "application/json; charset=utf-8",
          data: { category: category, needle: needle, limit: limit },
          cache: false
      })
      .done(function( msg ) {
//        console.log( "Done: " + msg );
        $("content").html("");
        if(msg !== false){
        	displayPosts(msg);
        	$("#search-box input[type=text]").val("");
        }
        	$("#search-box input[type=text]").removeAttr("disabled");
        	$("#search-box button").removeAttr("disabled");
        
      })
      .fail(function( jqXHR, textStatus ) {
        console.log( "Request failed: " + textStatus );
        
        $("#search-box input[type=text]").removeAttr("disabled");
        $("#search-box button").removeAttr("disabled");
      });
}
function makeAPost(post){
	var h = "";
		h+='';
		h+='<article data-id="'+post.id+'">';
        h+='<row>';
              h+='<div class="container-fluid">';
                h+='<div class="col-md-12">';
                    h+='<div class="post-heading col-md-12">';
                      h+='<span class="post-title">'+post.title+'</span>';
                      h+='<span class="post-date">: '+post.date+'</span>';
                    h+='</div>';
                    h+='<div class="post-body col-md-12">';
	                  if(post.image != ""){
	                	h+='<div><img class="post-img" src="'+post.image+'" /></div>';
	                  }
                      h+='<p>'+post.message+'</p>';
                    h+='</div>';
                    h+='<div class="post-comments col-md-12">';
                      h+='<div class="comments-summary col-md-12">';
                        h+='<span></span>';
                      h+='</div>';
                      h+='<div class="comments-thread col-md-12">';
                      	h+='<div class="comments-thread-box">';
                          h+='<div class="comments-thread-content">';
                          h+='</div>';
                        h+='</div>';
                      h+='</div>';
                      h+='<div class="comments-box">';
	                      h+='<div class="row">';
	                      	h+="<div class='col-1 col-md-1 fit-content paddless_right big-break'>";
	                        	h+="<span class='col'><i class='"+icon_class+" margeless_right'></i> &nbsp; </span>";
	                    		h+='</div>';
	                    		h+="<div class='col-11 col-md-9 margeless_left paddless_left margeless_right paddless_right'>";
	                        	h+="<textarea class='fill-available margeless_left' name='' maxlength=500 placeholder='Add a comment..'></textarea>";
	                        h+='</div>';
	                        h+="<div class='col-8 col-md-2 '>";
	                        	h+="<button type='button' class='comment_button btn btn-default fill-available'> Comment </button>";
	                        h+='</div>';
	                      h+='</div>';
                      h+='</div>';
                    h+='</div>';
                h+='</div>';
              h+='</div>';
        h+='</row>';
      h+='</article>';
	return h;
}

function displayPosts(posts){
	if(posts !== false){
		var h = "";
		for(const x in posts){
	//		console.log(posts[x]);
			h+=makeAPost(posts[x]);
		}
		$("content").html(h);
	}
}

function addComment(post_id, message, txtinput, location){
      $.post(base_url+"Api/Api/comment_create", { post_id: post_id, message: message }, function() {
//		  console.log( "success" );
		},"json")
      .done(function( msg ) {
//        console.log( "Done addComment: " + msg );
        if(msg !== false){
					location.append(makeAComment(msg));  
					txtinput.val("");      	
        }
        txtinput.removeAttr("disabled");
      })
      .fail(function( jqXHR, textStatus ) {
        console.log( "Request failed: " + textStatus );

        txtinput.removeAttr("disabled");
      });
}
function getCommentsSummary(post_id){
	$.ajax({
          method: "GET",
          url: base_url+"Api/Api/comments_summary",
          dataType: "json",
          contentType: "application/json; charset=utf-8",
          data: { post_id: post_id },
          cache: false
      })
      .done(function( msg ) {
//        console.log( "Done: " + msg );
        if(msg !== false){
        	console.log($("article[data-id="+post_id+"] .comments-summary span"));
        	$("article[data-id="+post_id+"] .comments-summary span").html(msg.summary);
//        	displayCommentSummary(msg);
        }
      })
      .fail(function( jqXHR, textStatus ) {
        console.log( "Request failed: " + textStatus );
      });
}
function getComments(post_id, limit, location){
      $.ajax({
          method: "GET",
          url: base_url+"Api/Api/comments",
          dataType: "json",
          contentType: "application/json; charset=utf-8",
          data: { post_id: post_id, limit: limit },
          cache: false
      })
      .done(function( msg ) {
//        console.log( "Done: " + msg );
        if(msg !== false){
        	displayComments(msg, location);
        }
      })
      .fail(function( jqXHR, textStatus ) {
        console.log( "Request failed: " + textStatus );
      });
}
function makeAComment(comment, location){
	var h = "";
//		console.log(comment);
//		console.log(comment["message"]);

		h+='';
		h+='<div class="comments-item" data-id="'+comment.id+'">';
	      h+='<div class="comments-item-avatar">';
	        h+='<span>';
	        h+='<img src="'+ base_url +'assets/img/profile-pic.png">';
	        h+='</span>';
	      h+='</div>';
	      h+='<div class="comments-item-message-box">';
	        h+='<div class="comments-item-message"><span>'+comment.message+'</span></div>';
	        h+='<div class="comments-item-date"><span>'+comment.date+'</span></div>';
	      h+='</div>';
	    h+='</div>';
	return h;
}
function displayComments(comments, location){
	var h = "";
	for(const x in comments){
//		console.log(comments[x]);
		h+=makeAComment(comments[x]);
	}
	location.html(h);
}

