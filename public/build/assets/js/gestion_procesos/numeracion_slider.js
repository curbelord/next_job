export default {
    props: ['numero_pagina'],
    template: `
    <div class="numeracion_slider">
        <button type="button" @click="avisoPadreRecargaProcesos">{{ numero_pagina }}</button>
    </div>
    `,
    methods: {
        avisoPadreRecargaProcesos(){
            this.$emit('recargarProcesos', this.numero_pagina);
        },
    }
}
