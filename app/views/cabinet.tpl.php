<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Кабінет</title>

    <!-- Bootstrap CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

</head>
<body>

<div class="container" id="cabinet">
    <table class="table">
        <tr>
            <th colspan="3"><h1>{{ title1 }}</h1></th>
        </tr>
        <tr>
            <th>Ім'я</th>
            <td>{{ user.name }} {{ user.surname }}</td>
            <td class="text-center">
                <button @click="showNameEdit=!showNameEdit" class="btn btn-info btn-md"><span class="glyphicon glyphicon-pencil"></span></button>
            </td>
        </tr>
        <tr class="info" v-if="showNameEdit">
            <td colspan="3">
                Ім'я: <input type="text" name="name" id="name" class="form-control" required="required" v-model="user.name">
                <br>Прізвище: <input type="text" name="surname" id="surname" class="form-control" required="required" v-model="user.surname">
            </td>
        </tr>
        <tr>
            <th>Дата народження</th>
            <td>{{ user.birthday }}</td>
            <td class="text-center">
                <button @click="showBirthdayEdit=!showBirthdayEdit" class="btn btn-info btn-md"><span class="glyphicon glyphicon-pencil"></span></button>
            </td>
        </tr>
        <tr class="info" v-if="showBirthdayEdit">
            <td colspan="3">
                <input type="date" class="form-control" name="birthday" id="birthday" required="required" v-model="user.birthday">
            </td>
        </tr>
        <tr>
            <th>Телефон</th>
            <td>{{ user.phone }}</td>
            <td class="text-center">
                <button @click="showPhoneEdit=!showPhoneEdit" class="btn btn-info btn-md"><span class="glyphicon glyphicon-pencil"></span></button>
            </td>
        </tr>
        <tr class="info" v-if="showPhoneEdit">
            <td colspan="3">
                Телефон: <input type="text" name="phone" id="phone" class="form-control" required="required" v-model="user.phone">
            </td>
        </tr>
        <tr>
            <th>Місце проживання</th>
            <td>{{ user.address }}</td>
            <td class="text-center">
                <button @click="showAddressEdit=!showAddressEdit" class="btn btn-info btn-md"><span class="glyphicon glyphicon-pencil"></span></button>
            </td>
        </tr>
        <tr class="info" v-if="showAddressEdit">
            <td colspan="3">
                Місце проживання: <input type="text" name="address" id="address" class="form-control" required="required" v-model="user.address">
            </td>
        </tr>

        <tr>
            <th colspan="3"><h1>{{ title2 }}</h1></th>
        </tr>
        <tr>
            <td colspan="2">{{ user.about_me }}</td>
            <td class="text-center">
                <button @click="showAboutMeEdit=!showAboutMeEdit" class="btn btn-info btn-md"><span class="glyphicon glyphicon-pencil"></span></button>
            </td>
        </tr>
        <tr class="info" v-if="showAboutMeEdit">
            <td colspan="3">
                <textarea type="text" name="about_me" id="about_me" class="form-control" required="required" v-model="user.about_me">
                </textarea>
            </td>
        </tr>
    </table>

    <pre>{{ $data }}</pre>
</div>


<!-- jQuery -->
<script src="//code.jquery.com/jquery.js"></script>
<!-- Bootstrap JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!-- Vue.js -->
<script src="https://unpkg.com/vue"></script>
<script src="https://cdn.jsdelivr.net/vue.resource/1.2.1/vue-resource.min.js"></script>

<script>
    Vue.http.options.root = '/cabinet';
    var app = new Vue({
        el: '#cabinet',
        data: {
            title1: 'Загальна інформація',
            title2: 'Про мене',
            showNameEdit: false,
            showBirthdayEdit: false,
            showPhoneEdit: false,
            showAddressEdit: false,
            showAboutMeEdit: false,
            user: {}
        },
        computed: {
        },
        methods: {
//            getUser: function() {
//                this.user = response.data;
//            }
            getUser: function() {
                this.$http.get('/cabinet/get').then(response => {
                    this.user = response.body;
            });
            }

        }
    });
    app.getUser();
</script>
</body>
</html>