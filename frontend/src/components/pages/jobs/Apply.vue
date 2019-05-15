<template>
    <div>
        <form class="login" v-on:submit.prevent="send" v-if="false === isSentSuccess">
            <div v-if="getNameText">
                <input type="text" v-model="form.name" required :placeholder="getNameText.name" class="input">
                <div class="error">
                    {{ errors.name }}
                </div>
            </div>

            <div v-if="getEmailText">
                <input type="email" v-model="form.email" required :placeholder="getEmailText.name" class="input">
                <div class="error">
                    {{ errors.email }}
                </div>
            </div>

            <div v-if="getPhoneText">
                <input type="text" v-model="form.phone" required :placeholder="getPhoneText.name" class="input">
                <div class="error">
                    {{ errors.phone }}
                </div>
            </div>

            <div v-if="getDescriptionText">
                <textarea v-model="form.message" :placeholder="getDescriptionText.name" class="textarea">
                </textarea>
                <div class="error">
                    {{ errors.message }}
                </div>
            </div>

            <div v-if="getAttachCVText">

                <div class="file">
                    <p>{{ getAttachCVText.name }}</p>

                    <input type="file"
                           accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf, application/x-pdf"
                           @change="showUploadedFiles"
                           ref="file"
                           class="file-input"
                    >
                </div>

                <div class="uploaded-files">
                    <span v-for="(file, index) in form.files" :key="index" class="uploaded-file">
                        <span>{{ file.name }}</span>

                        <svg class="icon" @click="removeFile(index)">
                            <use xlink:href="#close"></use>
                        </svg>
                    </span>
                </div>
            </div>

            <div v-if="getAgreementText">
                <label for="agree" class="label">
                    <input type="checkbox" v-model="form.agree" id="agree">
                    <span class="checkmark"></span>
                    {{ getAgreementText.name }}
                </label>
            </div>

            <button :disabled="!form.agree" v-if="false === isSending" class="btn">
                <span v-if="getSendText">
                    {{ getSendText.name }}
                </span>
            </button>

            <loader v-if="true === isSending"/>

        </form>

        <div v-if="isSentSuccess" @click="isSentSuccess = false" v-html="getSendSuccessText.content"></div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import Loader from '../../elements/Loader';

    const SLUG_NAME = 'name';
    const SLUG_EMAIL = 'email';
    const SLUG_PHONE = 'phone';
    const SLUG_DESCRIPTION = 'description';
    const SLUG_ATTACH_CV = 'attach-cv';
    const SLUG_AGREEMENT_PERSONAL_DATA = 'agreement-personal-data';
    const SLUG_SEND = 'send';
    const SLUG_SEND_SUCCESS = 'send-success';

    export default {
        data() {
            return {
                isSending: false,
                isSentSuccess: false,
                form: {
                    /*name: null,
                    email: null,
                    phone: null,
                    message: null,
                    files: [],
                    agree: false,*/
                    name: 'Vasya',
                    email: 'vasya@gmail.com',
                    phone: '+7 (916) 123-12-23',
                    message: 'This is test message.' + (new Date).getTime(),
                    files: [],
                    agree: true,
                },
                errors: [],
            };
        },
        computed: {
            ...mapGetters([
                'getTextBySlug',
            ]),
            getNameText() {
                return this.getTextBySlug(SLUG_NAME);
            },
            getEmailText() {
                return this.getTextBySlug(SLUG_EMAIL);
            },
            getPhoneText() {
                return this.getTextBySlug(SLUG_PHONE);
            },
            getDescriptionText() {
                return this.getTextBySlug(SLUG_DESCRIPTION);
            },
            getAttachCVText() {
                return this.getTextBySlug(SLUG_ATTACH_CV);
            },
            getAgreementText() {
                return this.getTextBySlug(SLUG_AGREEMENT_PERSONAL_DATA);
            },
            getSendText() {
                return this.getTextBySlug(SLUG_SEND);
            },
            getSendSuccessText() {
                return this.getTextBySlug(SLUG_SEND_SUCCESS);
            },
        },
        created() {
            this.fillFormWithFields = function (form) {
                form.append('name', this.form.name);
                form.append('email', this.form.email);
                form.append('phone', this.form.phone);
                form.append('message', this.form.message);
            };
            this.fillFormWithFiles = function (form) {
                for (let i = 0; i < this.form.files.length; i++) {
                    let file = this.form.files[i];
                    form.append(`files[${i}]`, file);
                }
            };
            this.handleSuccess = function () {
                this.isSending = false;
                this.isSentSuccess = true;

                this.form.name = this.form.email = this.form.phone = this.form.message = null;
                this.form.files = this.errors = [];
            };
            this.handleError = function (error) {
                this.isSending = this.isSentSuccess = false;

                if (error.response && error.response.data.errors) {
                    this.errors = error.response.data.errors;
                    return;
                }

                window.console.log(error.message);
                alert('Server error.');
            };
        },
        methods: {
            ...mapActions([
                'contact',
            ]),
            showUploadedFiles(event) {
                const files = event.target.files;

                if (files.length === 0) {
                    return;
                }

                const file = files[0];
                this.form.files.push(file);
            },
            removeFile(index) {
                this.form.files.splice(index, 1);
            },
            send() {
                this.isSending = true;

                const form = new FormData();
                this.fillFormWithFields(form);
                this.fillFormWithFiles(form);

                this
                    .$store
                    .dispatch('contact', form)
                    .then(this.handleSuccess.bind(this))
                    .catch(this.handleError.bind(this));
            },
        },
        components: {
            Loader,
        },
    }
</script>

<style lang="scss">
    @import "../../../assets/scss/colors";
    @import "../../../assets/scss/variables";

    .input, .textarea {
        background: transparent;
        border: 0;
        border-bottom: 2px solid $light;
        color: $light;
        font-size: $fontNormal;
        max-width: 400px;
        margin-bottom: 20px;
        width: 100%;

        &:focus {
            outline: none;
        }
    }

    .input {
        height: 30px;
    }

    .textarea {
        height: 120px;
        resize: none;
    }

    .error {
        color: $danger
    }

    .file {
        color: $gray;
        margin: 20px 0 0;
        position: relative;

        p {
            cursor: pointer;
            text-decoration: underline;
        }

        &:hover {
            color: $light;
        }

        &-input {
            bottom: 0;
            cursor: pointer;
            left: 0;
            opacity: 0;
            position: absolute;
            right: 0;
            top: 0;
            width: 100%;
        }
    }

    .uploaded-files {
        margin: 0 0 20px;
    }

    .uploaded-file {
        display: inline-block;
        margin-right: 15px;

        .icon {
            cursor: pointer;
            height: 12px;
            margin: 0 0 0 5px;
            position: relative;
            top: 1px;
            width: 12px;

            &:hover {
                opacity: $opacity;
            }
        }
    }
</style>