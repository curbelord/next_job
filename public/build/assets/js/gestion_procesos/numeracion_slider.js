export default {
    props: ['numero_pagina', 'metodo_boton'],
    template: `
    <div class="numeracion_slider">
        <button type="button" v-if="metodo_boton == 'recargaProcesos'" @click="avisoPadreRecargaProcesos">{{ numero_pagina }}</button>
        <button type="button" v-else @click="avisoPadreRecargaCandidatos">{{ numero_pagina }}</button>
    </div>
    `,
    methods: {
        avisoPadreRecargaProcesos(){
            this.$emit('recargarProcesos', this.numero_pagina);
        },
        avisoPadreRecargaCandidatos(){
            this.$emit('avisarPadreRecargaCandidatos', this.numero_pagina);
        },
    }
}
