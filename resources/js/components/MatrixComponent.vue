<template>
    <div class="container">
        <div class="row justify-content-center" style="height: 100vh; display: flex; align-items: center; justify-content: center;">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Matrix calculation</div>

                    <div class="card-body">

                        <div class="alert alert-danger" v-show="errorMessage">
                            {{ errorMessage }}
                        </div>

                        <div class="alert alert-danger" v-show="validationMessages.length">
                            <ul class="mb-0">
                                <li v-for="message in validationMessages">
                                    {{ message }}
                                </li>
                            </ul>
                        </div>

                        <div class="form-group">
                            <input type="text" v-model="columnA" placeholder="Enter an alpha sequence">
                            x
                            <input type="text" v-model="columnB" placeholder="Enter an alpha sequence">
                        </div>
                        <div class="form-group">
                            = {{ result }}
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="button" class="btn btn-primary float-right" @click="calculate">Calculate</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                errorMessage: null,
                validationMessages: [],
                result: null,
                columnA: '',
                columnB: 'B',
            }
        },
        methods: {
            calculate() {
                this.clearErrors();

                axios.post('/api/calculations/multiply', {
                    values: [this.columnA, this.columnB]
                })
                .then((response) => {
                    this. result = response.data.sum;
                })
                .catch((error) => {
                    if(error.response.status == 422) {

                        for(let messages in error.response.data.errors) {
                            this.validationMessages.push(error.response.data.errors[messages][0]);
                        }
                    }
                    else {
                        this.errorMessage = 'Er is een probleem met uw aanvraag. Probeer het later nog eens';
                    }
                });
            },

            clearErrors() {
                this.errorMessage = null;
                this.validationMessages = [];
            }
        },
        mounted() {

        }
    }
</script>
