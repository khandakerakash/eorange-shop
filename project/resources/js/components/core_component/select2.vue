<template>
    <select :name="name" class="form-control"   :multiple="multiple">
        <slot></slot>
    </select>

</template>

<script>
           import Select2 from 'select2';

    export default {
        props: {
            name: '',
            options: {
                Object
            },
            value: null,
            multiple: {
                Boolean,
                default: false

            },
            classs:null
        },
        data:function() {
            return {
                select2data: []
            }
        },
        watch: {
            options: function (options) {
                // update options
                console.log(options);
                // $(this.$el).off().select2('destroy');
                $(this.$el).select2({ data: options })
            },
            value: function (value, oldValue) {
                // update value
                alert(value);
                $(this.$el)
                    .val(this.value)
                    .trigger('change', { ignore: false });
            }

        },
        mounted:function() {
            let vm = this
            let select = $(this.$el);
            select.select2({
                    placeholder: 'Select',
               // theme: 'bootstrap',
                    width: '100%',
                    allowClear: true,
                    data: this.options
                })
                .on('change', function () {
                    vm.$emit('input', select.val())
                });
            select.val(this.value).trigger('change')
        },
        destroyed: function () {
            $(this.$el).off().select2('destroy')
        }
    }
</script>
<style scoped>
</style>
