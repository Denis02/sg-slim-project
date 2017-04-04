<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title Page</title>

    <!-- Bootstrap CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container" id="rest-client">
    <h1 class="text-center">{{ message }}</h1>


    <div class="panel panel-info" v-for="item in items">
        <div class="panel-heading">
            <h3 class="panel-title">
                {{ item.email }}
                <a href="cabinet" class="pull-right" v-on:click="editItem(item)">
                    Edit&nbsp;
                </a>
            </h3>
        </div>
        <div class="panel-body">
            {{ item.name }}
            {{ item.surname }}
        </div>
    </div>


</div>

<!-- jQuery -->
<script src="//code.jquery.com/jquery.js"></script>
<!-- Bootstrap JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!-- Vue.js -->
<script src="https://unpkg.com/vue"></script>
<script src="https://cdn.jsdelivr.net/vue.resource/1.2.1/vue-resource.min.js"></script>

<script>
    Vue.http.options.root = '/items';
    var app = new Vue({
        el: '#rest-client',
        data: {
            message: 'REST Demo',
            items: [],
            newItem: {
                name: '',
                email: ''
            },
            editedItem: null
        },
        computed: {
        },
        methods: {
            editItem: function(item) {
                this.editedItem = item.id;
            },
            getItems: function() {
                this.$http.get('/users').then(response => {
                    this.items = response.body;
            });
            }
        }
    });
    app.getItems();
</script>

</body>
</html>