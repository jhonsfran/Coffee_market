-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2016-12-02 20:05:43.349

-- foreign keys
ALTER TABLE responde
    DROP CONSTRAINT Responde_cuenta;

ALTER TABLE responde
    DROP CONSTRAINT Responde_pqrs;

ALTER TABLE agregar_deseo
    DROP CONSTRAINT agregar_deseo_catalogo;

ALTER TABLE agregar_deseo
    DROP CONSTRAINT agregar_deseo_usuario;

ALTER TABLE cafe
    DROP CONSTRAINT cafe_finca;

ALTER TABLE cafe
    DROP CONSTRAINT cafe_origen;

ALTER TABLE cafe
    DROP CONSTRAINT cafe_perfil;

ALTER TABLE cafe
    DROP CONSTRAINT cafe_producto;

ALTER TABLE cafe
    DROP CONSTRAINT cafe_productor;

ALTER TABLE cafe
    DROP CONSTRAINT cafe_tipo;

ALTER TABLE cafe
    DROP CONSTRAINT cafe_variedad;

ALTER TABLE calificar
    DROP CONSTRAINT calificar_catalogo;

ALTER TABLE calificar
    DROP CONSTRAINT calificar_usuario;

ALTER TABLE casero
    DROP CONSTRAINT casero_suscripcion;

ALTER TABLE comentario
    DROP CONSTRAINT comentar_catalogo;

ALTER TABLE comentar
    DROP CONSTRAINT comentar_compartir_compra;

ALTER TABLE comentar
    DROP CONSTRAINT comentar_usuario;

ALTER TABLE comentario
    DROP CONSTRAINT comentario_usuario;

ALTER TABLE compartir
    DROP CONSTRAINT compartir_catalogo;

ALTER TABLE compartir_comentarios
    DROP CONSTRAINT compartir_comentarios_compartir;

ALTER TABLE compartir_compra
    DROP CONSTRAINT compartir_compra_compra;

ALTER TABLE compartir_me_gustas
    DROP CONSTRAINT compartir_me_gustas_compartir;

ALTER TABLE compartir
    DROP CONSTRAINT compartir_usuario;

ALTER TABLE compra
    DROP CONSTRAINT compra_catalogo;

ALTER TABLE compra
    DROP CONSTRAINT compra_domicilio;

ALTER TABLE compra
    DROP CONSTRAINT compra_usuario;

ALTER TABLE crea_producto
    DROP CONSTRAINT crear_cuenta;

ALTER TABLE crea_producto
    DROP CONSTRAINT crear_producto;

ALTER TABLE cuenta
    DROP CONSTRAINT cuenta_suscripcion;

ALTER TABLE cuenta
    DROP CONSTRAINT cuenta_tipo_cuenta;

ALTER TABLE cuenta
    DROP CONSTRAINT cuenta_usuario;

ALTER TABLE direccion_domicilio
    DROP CONSTRAINT direccion_domicilio_domicilio;

ALTER TABLE direcciones_usuario
    DROP CONSTRAINT direcciones_usuario_usuario;

ALTER TABLE empresarial
    DROP CONSTRAINT empresarial_suscripcion;

ALTER TABLE especial
    DROP CONSTRAINT especial_suscripcion;

ALTER TABLE me_gusta
    DROP CONSTRAINT me_gusta_compartir_compra;

ALTER TABLE me_gusta
    DROP CONSTRAINT me_gusta_usuario;

ALTER TABLE modulo_objetos_mod
    DROP CONSTRAINT modulo_objetos_mod_modulo;

ALTER TABLE modulo_objetos_mod
    DROP CONSTRAINT modulo_objetos_mod_objetos_modulo;

ALTER TABLE otros
    DROP CONSTRAINT otros_otro_tipo_producto;

ALTER TABLE otros
    DROP CONSTRAINT otros_producto;

ALTER TABLE preferencia_cuenta
    DROP CONSTRAINT preferencia_cuenta_cuenta;

ALTER TABLE preferencia_cuenta
    DROP CONSTRAINT preferencia_cuenta_preferencias;

ALTER TABLE probadita
    DROP CONSTRAINT probadita_suscripcion;

ALTER TABLE realiza
    DROP CONSTRAINT realiza_cuenta;

ALTER TABLE realiza
    DROP CONSTRAINT realiza_pqrs;

ALTER TABLE cuenta
    DROP CONSTRAINT rol_cuenta;

ALTER TABLE rol_modulo
    DROP CONSTRAINT rol_modulo_modulo;

ALTER TABLE rol_modulo
    DROP CONSTRAINT rol_modulo_rol;

ALTER TABLE suscripcion
    DROP CONSTRAINT suscripcion_producto;

ALTER TABLE usuario
    DROP CONSTRAINT usuario_cuenta_bancaria;

-- tables
DROP TABLE agregar_deseo;

DROP TABLE cafe;

DROP TABLE calificar;

DROP TABLE casero;

DROP TABLE catalogo;

DROP TABLE comentar;

DROP TABLE comentario;

DROP TABLE compartir;

DROP TABLE compartir_comentarios;

DROP TABLE compartir_compra;

DROP TABLE compartir_me_gustas;

DROP TABLE compra;

DROP TABLE crea_producto;

DROP TABLE cuenta;

DROP TABLE cuenta_bancaria;

DROP TABLE direccion_domicilio;

DROP TABLE direcciones_usuario;

DROP TABLE domicilio;

DROP TABLE empresarial;

DROP TABLE especial;

DROP TABLE finca;

DROP TABLE me_gusta;

DROP TABLE modulo;

DROP TABLE modulo_objetos_mod;

DROP TABLE objetos_modulo;

DROP TABLE origen;

DROP TABLE otro_tipo_producto;

DROP TABLE otros;

DROP TABLE perfil;

DROP TABLE pqrs;

DROP TABLE preferencia_cuenta;

DROP TABLE preferencias;

DROP TABLE probadita;

DROP TABLE producto;

DROP TABLE productor;

DROP TABLE realiza;

DROP TABLE responde;

DROP TABLE rol;

DROP TABLE rol_modulo;

DROP TABLE suscripcion;

DROP TABLE tipo;

DROP TABLE tipo_cuenta;

DROP TABLE usuario;

DROP TABLE variedad;

-- End of file.

