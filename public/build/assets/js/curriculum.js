import experiencia_laboral from "./experiencia_laboral.js";
import formacion from "./formacion.js";

export default {
    props: ['nombre', 'fecha_nacimiento', 'direccion_postal', 'telefono', 'email', 'nombre_experiencia', 'empresa_experiencia', 'fecha_inicio_experiencia', 'fecha_fin_experiencia', 'descripcion_experiencia', 'nombre_formacion', 'centro_formacion', 'fecha_inicio_formacion', 'fecha_fin_formacion'],
    components: {
        experiencia_laboral,
        formacion,
    },
    template: `
    <div id="container_datos_top_curriculum">
        <div id="subcontainer_datos_curriculum">
            <div id="datos_curriculum">
                <div id="imagen_usuario_curriculum"></div>
                <div id="valor_datos_curriculum">
                    <div id="nombre_usuario_curriculum">
                        <h3>{{ nombre }}</h3>
                    </div>
                    <div id="fecha_nacimiento_curriculum">
                        <p>{{ fecha_nacimiento }}</p>
                    </div>
                    <div id="direccion_postal_curriculum">
                        <p>{{ direccion_postal }}</p>
                    </div>
                    <div id="telefono_curriculum">
                        <p>{{ telefono }}</p>
                    </div>
                    <div id="correo_electronico_curriculum">
                        <p>{{ email }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="container_experiencia_laboral_curriculum">
        <div id="titulo_experiencia_laboral_curriculum">
            <h3>Experiencia laboral</h3>
        </div>
        <div id="subcontainer_experiencia_laboral_curriculum">
            <experiencia_laboral v-for="i in nombre_experiencia.length" :key="i" :nombre_experiencia="nombre_experiencia[i - 1]" :empresa_experiencia="empresa_experiencia[i - 1]" :fecha_inicio_experiencia="fecha_inicio_experiencia[i - 1]" :fecha_fin_experiencia="fecha_fin_experiencia[i - 1]" :descripcion_experiencia="descripcion_experiencia[i - 1]"></experiencia_laboral>
        </div>
    </div>

    <div id="container_formacion_curriculum">
        <div id="titulo_formacion_curriculum">
            <h3>Formación</h3>
        </div>
        <div id="subcontainer_formacion_curriculum">
            <formacion v-for="i in nombre_formacion.length" :key="i" :nombre_formacion="nombre_formacion[i - 1]" :centro_formacion="centro_formacion[i - 1]" :fecha_inicio_formacion="fecha_inicio_formacion[i - 1]" :fecha_fin_formacion="fecha_fin_formacion[i - 1]"></formacion>
        </div>
    </div>
    `
}
