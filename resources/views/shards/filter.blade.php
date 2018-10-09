<script>

//refactor and concatenate!

// toggling the filter card
	var filterActive = false;

	if (filterActive == false) {
		$("#filter-button").click(function(e) {
			e.preventDefault();
			// $("#filter-block").toggleClass('toggled');
			$("#filter-block").slideToggle("600", function() {
			});
			var filterActive = true;
		});
	} else if (filterActive == true) {
		$("#filter-button").click(function(e) {
			e.preventDefault();
			$("#filter-block").slideToggle("600", function() {
			});
			// $("#filter-block").toggleClass('toggled');
			var filterActive = false;

		});
	}
	
	


// for checkboxes
    // $("input:checkbox").on("change", function() {

    //     var a = $("input:checkbox:checked").map(function() {
    //         return $(this).val()
    //     }).get()

    //     var all = $("#filter-here tr").hide();

    //     var data = $(".data").filter(function() {
    //         var result = $(this).text(),
    //             index = $.inArray(result, a);
	   //          return index >= 0
    //     }).parent().show();

    //     if (!data.length) {

    //     	var data = all;

    //     	data.filter(data).show();
    //     }

    // });

    $("input:checkbox").on("change", function() {

        var a = $("input:checkbox:checked").map(function() {
            return $(this).val()
        }).get()

        var all = $("#filter-here .job-listed").hide();

        var data = $(".data").filter(function() {
            var result = $(this).text(),
                index = $.inArray(result, a);
	            return index >= 0
        }).parent().show();

        if (!data.length) {

        	var data = all;

        	data.filter(data).show();
        }

    });


// for search
	// $("#search-input").keyup(function () {
	//     //split the current value of searchInput
	//     var data = this.value.toUpperCase().split(" ");
	//     //create a jquery object of the rows
	//     var jo = $("#filter-here").find("tr");
	//     if (this.value == "") {
	//         jo.show();
	//         return;
	//     }
	//     //hide all the rows
	//     jo.hide();

	//     //Recusively filter the jquery object to get results.
	//     jo.filter(function (i, v) {
	//         var $t = $(this);
	//         for (var d = 0; d < data.length; ++d) {
	//             if ($t.text().toUpperCase().indexOf(data[d]) > -1) {
	//                 return true;
	//             }
	//         }
	//         return false;
	//     })
	//     //show the rows that match.
	//     .show();
	// });


	$("#search-input").keyup(function () {
	    //split the current value of searchInput
	    var data = this.value.toUpperCase().split(" ");
	    //create a jquery object of the rows
	    var jo = $("#filter-here").find(".job-listed");
	    if (this.value == "") {
	        jo.show();
	        return;
	    }
	    //hide all the rows
	    jo.hide();

	    //Recusively filter the jquery object to get results.
	    jo.filter(function (i, v) {
	        var $t = $(this);
	        for (var d = 0; d < data.length; ++d) {
	            if ($t.text().toUpperCase().indexOf(data[d]) > -1) {
	                return true;
	            }
	        }
	        return false;
	    })
	    //show the rows that match.
	    .show();
	});

</script>