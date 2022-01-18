
// var $ = require( 'jquery' );
// require( 'datatables.net' );
// var buttons = require( 'datatables.net-buttons' )( window, $ );

// require( 'datatables.net-buttons/js/buttons.colVis.js' )();
// require( 'datatables.net-buttons/js/buttons.html5.js' )();
// require( 'datatables.net-buttons/js/buttons.print.js' )();


// $(document).ready( function () {
//     var table = $('.table').DataTable({
//         buttons: [
//           {
//             extend: "excel",
//             text: "تحميل Excel",
//             exportOptions: {
//               modifier: {
//                 page: "current",
//               },
//             },
//           },
//           {
//             extend: "pdf",
//             text: "تحميل PDF",
//             exportOptions: {
//               modifier: {
//                 page: "current",
//               },
//             },
//           },
//           {
//             extend: "colvis",
//             text: "إظهار / إخفاء عمود",
//             exportOptions: {
//               modifier: {
//                 page: "current",
//               },
//             },
//           },
//         ],
//         language: {
//           lengthMenu: "عرض _MENU_ أسطر لكل صفحة",
//           zeroRecords: "لا توجد بيانات - نحن آسفون",
//           info: "عرض صفحة _PAGE_ من _PAGES_",
//           infoEmpty: "لا تتوافر بيانات",
//           infoFiltered: "(تمت تصفيته من إجمالي السجلات _MAX_)",
//           decimal: "",
//           emptyTable: "لا توجد بيانات متوفرة في الجدول",
//           infoPostFix: "",
//           thousands: ",",
//           loadingRecords: "تحميل...",
//           processing: "قيد المعالجة...",
//           search: "بحث:",
//           paginate: {
//             first: "الأول",
//             last: "الاخير",
//             next: "التالي",
//             previous: "السابق",
//           },
//           aria: {
//             sortAscending: ": تفعيل لفرز العمود تصاعديا",
//             sortDescending: ": تفعيل لفرز العمود تنازلياً",
//           },
//         },
//       });
//     //   table.buttons().containers().appendTo("#example_wrapper .col-md-6:eq(0)");
// } );