export default {
    props: ['referencia', 'puesto_trabajo', 'ubicacion', 'fecha_creacion', 'estado'],
    data(){
        return{
            estadosPosibles: ["Publicada", "Plantilla", "Borrador"],
            estadoSeleccionado: this.estado,
            copiaEstadoEntrante: this.estado,
        }
    },
    template: `
    <div class="container_proceso">
        <div class="titulo_proceso">
            <h3>{{ puesto_trabajo }}</h3>
        </div>
        <div class="datos_mid_proceso">
            <div class="datos_mid_left_proceso">
                <div class="centro_trabajo">
                    <p>{{ ubicacion }}</p>
                </div>
                <div class="fecha_publicacion">
                    <p>{{ fecha_creacion }}</p>
                </div>
            </div>
            <div class="datos_mid_mid_proceso">
                <div class="estado" @change="muestraPopUpEdicionEstado">
                    <select v-model="estadoSeleccionado">
                        <option v-for="estadoActual in estadosPosibles" :selected="estadoActual == estado" :value="estadoActual">{{ estadoActual }}</option>
                    </select>
                </div>
            </div>
            <div class="datos_mid_right_proceso">
                <div class="hipervinculos">
                    <div class="imagen_datos_mid_right imagen_lapiz">
                        <a :href="'editar/' + referencia" @click.prevent="avisoPadreEdicionProceso"></a>
                    </div>
                    <div class="imagen_datos_mid_right imagen_papelera">
                        <a :href="'eliminar/' + referencia" @click.prevent="avisoPadreEliminacionProceso"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    `,
}
