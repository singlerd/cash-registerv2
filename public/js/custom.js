$(document).ready(function(){
    //event listener for printing
    $('#btnPrint').printPage();

    //Initialize fetchSolds function
    fetchSolds()

    //Add meta tag for CRSF token
    let CSRF_TOKEN =  $('meta[name="csrf-token"]').attr('content')

    //Store sale when user is clicked on button (Plaćeno)
    $(document).on("click",".btnSale",function(){
        $.ajax({
            url: '../storeSale',
            headers: CSRF_TOKEN,
            type: 'POST',
            data: {_token: CSRF_TOKEN, current_state_id: this.id},
            dataType: 'JSON',
            success: function () {
                fetchSolds()
            }
        });
    });

    //Fetch sold when user clicked on drink in sales
    //START
    function fetchSolds(){
        $.ajax({
           url: '../getSale',
           type: 'GET',
           dataType: 'JSON',
           success: function (response) {
               $("#fetchSolds").empty()
                   let len = 0;
                   if (response['sale'] != null) {
                       len = response['sale'].length;
                   }
                   if (len > 0) {
                       for (let i = 0; i < len; i++) {
                           let sale_id = response['sale'][i].sale_id;
                           let drink_name = response['sale'][i].drink_name;
                           let measure = response['sale'][i].measure;

                           let output =
                               "<div class='inline-block p-1'>" +
                                   "<div class=\"bg-blue-600 text-white p-2 rounded  leading-none flex items-center\">" +
                                            "   <span class=\"bg-white p-1 rounded text-blue-600 text-xs ml-2\">"+drink_name+" - "+(measure)+
                                                "<input type='hidden' value='"+sale_id+"' name='sale_id[]'>" +
                                               "<a class='cursor-pointer' id='delete' data-id='"+sale_id+"'>" +
                                                   "<svg class='inline' width='15' xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\">\n" +
                                                    "<path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M6 18L18 6M6 6l12 12\" />\n" +
                                                   "</svg>" +
                                               "</a>" +
                                               "</span>"+
                                    "</div>" +
                               "</div>"
                           $("#fetchSolds").append(output);
                            // countSale()
                       }
                   } else {
                       let output = "<p>Nemate ništa u kasi.</p>";
                       $("#fetchSolds").append(output);
                   }
               }
        });
    }
    //END

    //Delete drink from sales
    //START
    $(document).on("click","#delete",function () {
            let el = this;
            let deleteId = $(this).data('id');

            let alertDelete = confirm("Da li ste sigurni");
            if(alertDelete == true){
                $.ajax({
                    url: '../deleteSale'+deleteId,
                    type: "DELETE",
                    data: {_token: CSRF_TOKEN, id:deleteId},
                    success: function (response){
                        fetchSolds()
                        $(el).closest('div').css('background','tomato');
                        $(el).closest('div').fadeOut(1200,function(){
                            $(this).remove();
                        });
                    }
                });
            }
    });
    //END

    //Button for excel in current state
    $(document).on("click","#makeExcelFile",function () {
        $("#current-states-table").table2excel({
            filename: "excel_sheet-name.xls"
        });
    })

});

// Count sale, stop the redirection
// function countSale() {
//     $.ajax({
//         url: '../countSale',
//         type: 'GET',
//         dataType: 'JSON',
//         success: function (response) {
//             console.log(response['count_sale'])
//
//             let count_sale = response['count_sale'];
//             if(count_sale > 0) {
//
//                 $("a").click(function (event) {
//                     alert("Niste naplatili piće, tek nakon naplate možete da pređete na drugu stranicu")
//                     event.preventDefault();
//                     $('<div></div>')
//                         .append('default ' + event.type + ' prevented')
//                         .appendTo('#log');
//                 });
//             }
//         }
//     });
// }
