<template>
  <v-app>
    <v-content class="fill-height pt-0" fluid>
      <v-row justify="center">
        <v-col cols="12" sm="8" md="4">
            <h2 class="page-title">新規登録</h2>
            <v-form ref="form">
               <v-text-field
                  class="font-weight-bold"
                  v-model="name"
                  label="ユーザー名"
                  name="name"
                  prepend-icon="fas fa-user"
                  type="text"
                  :rules="[rule.required, rule.limit_max_name]"
                  :error-messagPes="errors.name"
                />
               <v-text-field
                  class="font-weight-bold"
                  v-model="email"
                  label="Eメール"
                  name="email"
                  prepend-icon="fas fa-envelope"
                  type="text"
                  :rules="[rule.required, rule.limit_max_length,rule.email]"
                  :error-messages="errors.email"
                />
                <v-text-field
                  class="font-weight-bold"
                  v-model="password"
                  label="パスワード"
                  name="password"
                  prepend-icon="fas fa-key"
                  type="password"
                  :rules="[rule.required,rule.limit_max_length]"
                  :error-messages="errors.password"
                />
                <v-text-field
                  class="font-weight-bold"
                  v-model="password_confirmation"
                  label="パスワード(再確認)"
                  name="password_confirmation"
                  prepend-icon="fas fa-key"
                  type="password"
                  :rules="[rule.required,rule.limit_max_length]"
                  :error-messages="errors.password_confirmation"
                />
            </v-form>
            <v-row justify="center">
                <v-btn class="button font-weight-bold my-5" color="#FFD500" rounded large v-on:click="register">新規登録</v-btn>
            </v-row>
        </v-col>
      </v-row>
    </v-content>
  </v-app>
</template>
<script>
import validation_rule from '../../validation.js'
export default {
  data: function() {
    return {
        rule: validation_rule,
        name:'',
        email: '',
        password: '',
        password_confirmation: '',
        errors: {
        }
    }
  },
  methods: {
    register: function(e) {
      if(this.$refs.form.validate()){
        let self = this;
        self.errors = {
            name: '',
            email: '',
            password:'',
            password_confirmation: ''
        }
        axios.post('register',{
            name: this.name,
            email:this.email,
            password: this.password,
            password_confirmation: this.password_confirmation
        }
        ).then(function(){
          self.errors = [];
          location.href = '/'
        }).catch(function(error){
          for(let key in error.response.data.errors) {
            self.errors[key] = error.response.data.errors[key][0];
          }
        });
      }
    },
  },
}
</script>
