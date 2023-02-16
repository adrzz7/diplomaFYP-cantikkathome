<style>
@import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap');
.table-sortable th {
cursor: pointer;
}

.table-sortable .th-sort-asc::after {
content: "\25b4";
}

.table-sortable .th-sort-desc::after {
content: "\25be";
}

.table-sortable .th-sort-asc::after,
.table-sortable .th-sort-desc::after {
margin-left: 5px;
}

.table-sortable .th-sort-asc,
.table-sortable .th-sort-desc {
background: rgba(1, 0, 0, 0.1);
}

.container{
    max-width: 1000px;
    margin: 30px auto;
    padding: 1.5rem 2rem 5rem 2rem;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px 0 rgba(155, 99, 228, 0.8), 0 6px 20px 0 rgba(155, 99, 228, 0.8);
    .container-top{
        @extend %flex-stack;
        .left{
            h2{
                opacity: 0.9;
            }
            p{
                opacity: 0.6;
                margin-right: 10rem;
            }
        }

    }
    .container-body{
        margin-top: 2rem;
        table {
            border-collapse: collapse;
            width: 100%;
            td, th {
                text-align: left;
                padding: 8px;
            }
            tr{
                border-bottom: 1px solid #ddd;
            }
        }
    }
}


.user-profile {
  padding: 10px;
  display: table;
  width: 700px;
  font-family: sans-serif;
}

.thumb {
  display: table-cell;
  width: 100px;
}


.remove {
  display: table-cell;
  vertical-align: middle;
  width: 1px;
}

#popup {
width:100px;
height:45px;
border-radius:5px;
background-color:#9b63e4;
color:#fff;
font-size:18px;
cursor:pointer;
}

/* add product form */
#abc {
width:100%;
height:100%;
opacity:.95;
top:0;
left:0;
display:none;
position:fixed;
background-color:#313131;
overflow:auto
}
#close {
position:absolute;
right:-14px;
top:-20px;
cursor:pointer;
background:transparent;
font-size:48px;
}
div#popupContact {
position:absolute;
left:50%;
top:17%;
margin-left:-202px;
}



h2 {
background: rgb(0, 0, 0, 0.5);;
padding:20px 35px;
margin:-10px -50px;
text-align:center;
border-radius:10px 10px 0 0
}
hr {
margin:10px -50px;
border:0;
border-top:1px solid #ccc
}
input[type=text],[type=number], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

#submit {
  background-color: black;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  width: 100px;
  text-decoration: none;
}

#submit:hover {
  background-color: #45a049;
}



.action {
width:80px;
height:45px;
border-radius:5px;
background-color:#9b63e4;
color:#fff;
cursor:pointer;
}

.wrapper{
padding-left:300px;
padding-right:50px;
margin-top:-450px;
max-width:400px;
}

.table{
}

</style>
