$(document).ready(function(){

    $('#btnPrint').printPage();

    fetchSolds()

    let CSRF_TOKEN =  $('meta[name="csrf-token"]').attr('content')

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

    function fetchSolds(){
        $.ajax({
           url: '../getSale',
           type: 'GET',
           dataType: 'JSON',
           success: function (response) {
               $("#fetchSolds").empty()
                   let len = 0;
                   if (response['data'] != null) {
                       len = response['data'].length;
                   }
                   if (len > 0) {
                       for (let i = 0; i < len; i++) {
                           let sale_id = response['data'][i].sale_id;
                           let name = response['data'][i].name;
                           let measure = response['data'][i].measure;

                           let output =
                               "<div class='inline-block p-1'>" +
                                   "<div class=\"bg-blue-600 text-white p-2 rounded  leading-none flex items-center\">" +
                                            "   <span class=\"bg-white p-1 rounded text-blue-600 text-xs ml-2\">"+name+" - "+(measure)+
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
                       }
                   } else {
                       let output = "<p>Nema nista</p>";
                       $("#fetchSolds").append(output);
                   }
               }
        });
    }

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

    $(document).on("click","#makeExcelFile",function () {
        $("#current-states-table").table2excel({
            filename: "excel_sheet-name.xls"
        });
    })


    document.querySelector('#pdfmake').addEventListener('click', downloadPDFWithPDFMake);
});


// START: pdfmake
function downloadPDFWithPDFMake() {
    var tableHeaderText = [...document.querySelectorAll('#current-states-table thead tr th')].map(thElement => ({ text: thElement.textContent, style: 'tableHeader' }));

    var tableRowCells = [...document.querySelectorAll('#current-states-table tbody tr td')].map(tdElement => ({ text: tdElement.textContent, style: 'tableData' }));
    var tableDataAsRows = tableRowCells.reduce((rows, cellData, index) => {
        if (index % 9 === 0) {
            rows.push([]);
        }

        rows[rows.length - 1].push(cellData);
        return rows;
    }, []);
    let today = new Date();
    let currentDate = today.getDate() + "." + (today.getMonth() + 1) + "." + today.getFullYear()
    var docDefinition = {

        header: { text: 'Obračun ' + currentDate, alignment: 'center' },
        footer: function(currentPage, pageCount) { return ({ text: `Strana ${currentPage} od ${pageCount}`, alignment: 'right' }); },
        content: [
            {
                style: 'tableExample',
                table: {
                    headerRows: 1,
                    body: [
                        tableHeaderText,
                        ...tableDataAsRows,
                    ]
                },
                layout: {
                    fillColor: function(rowIndex) {
                        if (rowIndex === 0) {
                            return '#0f4871';
                        }
                        return (rowIndex % 2 === 0) ? '#f2f2f2' : null;
                    }
                },
            },
        ],
        styles: {
            tableExample: {
                margin: [0, 5, 0, 10],
            },
            tableHeader: {
                margin: 3,
                color: 'white',
            },
            tableData: {
                margin:3,
            },
        },
    };
    let now = Date.now()
    pdfMake.createPdf(docDefinition).download("FlashRoyal" + now);
}

document.querySelector('#pdfmake').addEventListener('click', downloadPDFWithPDFMake);
// END: pdfmake
