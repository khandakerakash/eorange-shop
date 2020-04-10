<template>
    <select ref='select'>
        <slot></slot>
    </select>
</template>

<script>
    import Select2 from 'select2';

    export default {
        props: ['options', 'value'],

        mounted: function () {
            var vm = this;
            $(this.$refs.select)
                .select2({
                    width: '100%',
                    data: this.options,
                    createTag: function (params) {
                        return {
                            id: params.term,
                            text: params.term,
                            newOption: false
                        }
                    },
                    templateResult: function (data) {
                        var $result = $("<span></span>");
                        $result.text(data.text);
                        if (data.newOption) {
                            $result.append(" <em>(new)</em>");
                        }
                        return $result;
                    }
                })
                .on('change', function (ev, args) {
                    if (!(args && "ignore" in args)) {
                        vm.$emit('input', $(this).val());
                    }
                });

            Vue.nextTick(() => {
                $(this.$refs.select)
                    .val(this.value)
                    .trigger('change', { ignore: true })
            });
        },
        watch: {
            value: function (value, oldValue) {
                // update value
                $(this.$refs.select)
                    .val(this.value)
                    .trigger('change', { ignore: true });
            },
            options: function (options) {
                // update options
                console.log(this.value);
                // $(this.$refs.select).off().select2('destroy');
                $(this.$refs.select).select2().empty();
                $(this.$refs.select).select2({ data: options });
                $(this.$refs.select)
                    .val(this.value)
                    .trigger('change');
            }
        },
        destroyed: function () {
            $(this.$refs.select).off().select2('destroy')
        }
    }

</script>