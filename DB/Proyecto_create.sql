-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2016-12-02 20:05:43.349

-- tables
-- Table: agregar_deseo
CREATE TABLE agregar_deseo (
    agregar_deseo_user varchar(50)  NOT NULL,
    agregar_deseo_catalogo_id_catalogo int  NOT NULL,
    agregar_deseo_fecha date  NOT NULL,
    CONSTRAINT agregar_deseo_pk PRIMARY KEY (agregar_deseo_user,agregar_deseo_catalogo_id_catalogo)
);

-- Table: cafe
CREATE TABLE cafe (
    cafe_id_perfil int  NOT NULL,
    cafe_id_variedad int  NOT NULL,
    cafe_id_tipo int  NOT NULL,
    cafe_id_origen int  NOT NULL,
    cafe_id_finca int  NOT NULL,
    cafe_id_productor int  NOT NULL,
    cafe_id_producto int  NOT NULL,
    CONSTRAINT cafe_pk PRIMARY KEY (cafe_id_perfil,cafe_id_variedad,cafe_id_tipo,cafe_id_origen,cafe_id_finca,cafe_id_productor,cafe_id_producto)
);

-- Table: calificar
CREATE TABLE calificar (
    calificar_id serial  NOT NULL,
    calificar_usuario_nickname varchar(50)  NOT NULL,
    calificar_catalogo_id_catalogo int  NOT NULL,
    calificar_fecha date  NOT NULL,
    CONSTRAINT calificar_pk PRIMARY KEY (calificar_id)
);

-- Table: casero
CREATE TABLE casero (
    casero_suscripcion_id_suscripcion int  NOT NULL,
    casero_precio numeric  NOT NULL,
    casero_cantidad int  NOT NULL,
    CONSTRAINT casero_pk PRIMARY KEY (casero_suscripcion_id_suscripcion)
);

-- Table: catalogo
CREATE TABLE catalogo (
    catalogo_id_catalogo serial  NOT NULL,
    catalogo_cantidad int  NOT NULL,
    catalogo_fecha date  NOT NULL,
    catalogo_descuento int  NOT NULL,
    catalogo_precio numeric  NOT NULL,
    CONSTRAINT catalogo_pk PRIMARY KEY (catalogo_id_catalogo)
);

-- Table: comentar
CREATE TABLE comentar (
    comentar_usuario_nickname varchar(50)  NOT NULL,
    comentar_fecha date  NOT NULL,
    comentar_compartir_id_compartir int  NOT NULL,
    CONSTRAINT comentar_pk PRIMARY KEY (comentar_compartir_id_compartir)
);

-- Table: comentario
CREATE TABLE comentario (
    comentario_id serial  NOT NULL,
    comentario_usuario_nickname varchar(50)  NOT NULL,
    comentario_catalogo_id_catalogo int  NOT NULL,
    comentario_fecha date  NOT NULL,
    CONSTRAINT comentario_pk PRIMARY KEY (comentario_id)
);

-- Table: compartir
CREATE TABLE compartir (
    compartir_id serial  NOT NULL,
    compartir_usuario_nickname varchar(50)  NOT NULL,
    compartir_catalogo_id_catalogo int  NOT NULL,
    compartir_fecha date  NOT NULL,
    CONSTRAINT compartir_pk PRIMARY KEY (compartir_id)
);

-- Table: compartir_comentarios
CREATE TABLE compartir_comentarios (
    compartir_comentarios_id int  NOT NULL,
    compartir_comentarios_usuario_nickname varchar(50)  NOT NULL,
    compartir_comentarios_comentario varchar(255)  NOT NULL,
    CONSTRAINT compartir_comentarios_pk PRIMARY KEY (compartir_comentarios_id)
);

-- Table: compartir_compra
CREATE TABLE compartir_compra (
    compartir_compra_id_compartir serial  NOT NULL,
    compartir_compra_fecha date  NOT NULL,
    compartir_compra_id_compra int  NOT NULL,
    CONSTRAINT compartir_compra_pk PRIMARY KEY (compartir_compra_id_compartir)
);

-- Table: compartir_me_gustas
CREATE TABLE compartir_me_gustas (
    compartir_me_gusta_id int  NOT NULL,
    compartir_me_gustas_cant int  NOT NULL,
    CONSTRAINT compartir_me_gustas_pk PRIMARY KEY (compartir_me_gusta_id)
);

-- Table: compra
CREATE TABLE compra (
    compra_id_compra serial  NOT NULL,
    compra_estado boolean  NOT NULL,
    compra_fecha date  NOT NULL,
    domicilio_compra_id_domicilio int  NOT NULL,
    catalogo_compra_id_catalogo int  NOT NULL,
    usuario_compra_nickname varchar(50)  NOT NULL,
    CONSTRAINT compra_pk PRIMARY KEY (compra_id_compra)
);

-- Table: crea_producto
CREATE TABLE crea_producto (
    producto_crear_id_producto int  NOT NULL,
    cuenta_cuenta_id_cuenta int  NOT NULL,
    CONSTRAINT crea_producto_pk PRIMARY KEY (producto_crear_id_producto)
);

-- Table: cuenta
CREATE TABLE cuenta (
    cuenta_username varchar(20)  NOT NULL,
    cuenta_id_cuenta serial  NOT NULL,
    cuenta_fecha_creacion date  NOT NULL,
    cuenta_estado boolean  NOT NULL,
    cuenta_acumulador_puntos int  NOT NULL,
    cuenta_password varchar(60)  NOT NULL,
    cuenta_rol_id int  NOT NULL,
    cuenta_tipo_id int  NOT NULL,
    cuenta_suscripcion_id int  NOT NULL,
    cuenta_nivel varchar(50)  NOT NULL,
    cuenta_reputacion varchar(50)  NOT NULL,
    cuenta_expe varchar(50)  NOT NULL,
    CONSTRAINT cuenta_pk PRIMARY KEY (cuenta_id_cuenta)
);

-- Table: cuenta_bancaria
CREATE TABLE cuenta_bancaria (
    cuentaban_nro_cuenta numeric  NOT NULL,
    cuentaban_entidad_bancaria varchar(100)  NOT NULL,
    cuentaban_tipo_tarjeta varchar(100)  NOT NULL,
    cuentaban_ciudad varchar(80)  NOT NULL,
    cuentaban_codigo_postal numeric  NOT NULL,
    cuentaban_pais varchar(80)  NOT NULL,
    CONSTRAINT cuenta_bancaria_pk PRIMARY KEY (cuentaban_nro_cuenta)
);

-- Table: direccion_domicilio
CREATE TABLE direccion_domicilio (
    direccion_domicilio_id_domicilio int  NOT NULL,
    direccion_domicilio_ciudad varchar(100)  NOT NULL,
    direccion_domicilio_direccion varchar(100)  NOT NULL,
    direccion_domicilio_sector varchar(100)  NOT NULL,
    direccion_domicilio_barrio varchar(100)  NOT NULL,
    CONSTRAINT direccion_domicilio_pk PRIMARY KEY (direccion_domicilio_id_domicilio)
);

-- Table: direcciones_usuario
CREATE TABLE direcciones_usuario (
    dirusuario_nickname varchar(50)  NOT NULL,
    dir_direccion varchar(100)  NOT NULL,
    CONSTRAINT direcciones_usuario_pk PRIMARY KEY (dirusuario_nickname,dir_direccion)
);

-- Table: domicilio
CREATE TABLE domicilio (
    domicilio_id_domicilio serial  NOT NULL,
    domicilio_estado boolean  NOT NULL,
    domicilio_costo_envio int  NOT NULL,
    domicilio_fecha_entrega date  NOT NULL,
    domicilio_fecha_salida date  NOT NULL,
    CONSTRAINT domicilio_pk PRIMARY KEY (domicilio_id_domicilio)
);

-- Table: empresarial
CREATE TABLE empresarial (
    suscripcion_suscripcion_id_suscripcion int  NOT NULL,
    empresarial_periodicidad varchar(100)  NOT NULL,
    empresarial_precio numeric  NOT NULL,
    empresarial_cantidad int  NOT NULL,
    CONSTRAINT empresarial_pk PRIMARY KEY (suscripcion_suscripcion_id_suscripcion)
);

-- Table: especial
CREATE TABLE especial (
    suscripcion_suscripcion_id_suscripcion int  NOT NULL,
    suscripcion_periodicidad varchar(100)  NOT NULL,
    suscripcion_precio numeric  NOT NULL,
    suscripcion_cantidad int  NOT NULL,
    CONSTRAINT especial_pk PRIMARY KEY (suscripcion_suscripcion_id_suscripcion)
);

-- Table: finca
CREATE TABLE finca (
    finca_id_finca serial  NOT NULL,
    finca_nombre varchar(100)  NOT NULL,
    finca_descripcion int  NOT NULL,
    CONSTRAINT finca_pk PRIMARY KEY (finca_id_finca)
);

-- Table: me_gusta
CREATE TABLE me_gusta (
    usuario_me_gusta_nickname varchar(50)  NOT NULL,
    me_gusta_fecha date  NOT NULL,
    me_gusta_compartir_id_compartir int  NOT NULL,
    CONSTRAINT me_gusta_pk PRIMARY KEY (usuario_me_gusta_nickname,me_gusta_compartir_id_compartir)
);

-- Table: modulo
CREATE TABLE modulo (
    modulo_id_modulo serial  NOT NULL,
    modulo_nombre varchar(100)  NOT NULL,
    modulo_url varchar(250)  NOT NULL,
    modulo_imagen varchar(200)  NOT NULL,
    modulo_descripcion varchar(250)  NOT NULL,
    modulo_fecha_ingreso date  NOT NULL,
    CONSTRAINT modulo_pk PRIMARY KEY (modulo_id_modulo)
);

-- Table: modulo_objetos_mod
CREATE TABLE modulo_objetos_mod (
    modulo_objetos_mod_id_modulo int  NOT NULL,
    modulo_objetos_mod_id_objeto int  NOT NULL,
    CONSTRAINT modulo_objetos_mod_pk PRIMARY KEY (modulo_objetos_mod_id_modulo,modulo_objetos_mod_id_objeto)
);

-- Table: objetos_modulo
CREATE TABLE objetos_modulo (
    objetos_modulo_id_objeto serial  NOT NULL,
    objetos_modulo_nombre varchar(250)  NOT NULL,
    objetos_modulo_accion boolean  NOT NULL,
    objetos_modulo_imagen varchar(250)  NOT NULL,
    objetos_modulo_descripcion varchar(250)  NOT NULL,
    objetos_modulo_fecha_ingreso date  NOT NULL,
    CONSTRAINT objetos_modulo_pk PRIMARY KEY (objetos_modulo_id_objeto)
);

-- Table: origen
CREATE TABLE origen (
    tipo_id_origen serial  NOT NULL,
    tipo_nombre varchar(100)  NOT NULL,
    tipo_descripcion varchar(100)  NOT NULL,
    CONSTRAINT origen_pk PRIMARY KEY (tipo_id_origen)
);

-- Table: otro_tipo_producto
CREATE TABLE otro_tipo_producto (
    otro_tipo_producto_id_otro_tipo serial  NOT NULL,
    otro_tipo_producto_tipo varchar(100)  NOT NULL,
    CONSTRAINT otro_tipo_producto_pk PRIMARY KEY (otro_tipo_producto_id_otro_tipo)
);

-- Table: otros
CREATE TABLE otros (
    producto_otros_id_producto int  NOT NULL,
    otro_tipo_id_otro_tipo int  NOT NULL,
    CONSTRAINT otros_pk PRIMARY KEY (producto_otros_id_producto,otro_tipo_id_otro_tipo)
);

-- Table: perfil
CREATE TABLE perfil (
    perfil_id_perfil serial  NOT NULL,
    perfil_nombre varchar(100)  NOT NULL,
    perfil_descripcion varchar(100)  NOT NULL,
    CONSTRAINT perfil_pk PRIMARY KEY (perfil_id_perfil)
);

-- Table: pqrs
CREATE TABLE pqrs (
    pqrs_id_pgrs serial  NOT NULL,
    pqrs_descripcion varchar(200)  NOT NULL,
    pqrs_fecha date  NOT NULL,
    CONSTRAINT pqrs_pk PRIMARY KEY (pqrs_id_pgrs)
);

-- Table: preferencia_cuenta
CREATE TABLE preferencia_cuenta (
    prefcuenta_id_cuenta int  NOT NULL,
    prefcuenta_id_preferencia int  NOT NULL,
    CONSTRAINT preferencia_cuenta_pk PRIMARY KEY (prefcuenta_id_cuenta)
);

-- Table: preferencias
CREATE TABLE preferencias (
    preferencia_id_preferencia serial  NOT NULL,
    preferencia_nombre varchar(100)  NOT NULL,
    preferencia_descripcion varchar(250)  NOT NULL,
    CONSTRAINT preferencias_pk PRIMARY KEY (preferencia_id_preferencia)
);

-- Table: probadita
CREATE TABLE probadita (
    probadita_suscripcion_id_suscripcion int  NOT NULL,
    probadita_precio numeric  NOT NULL,
    CONSTRAINT probadita_pk PRIMARY KEY (probadita_suscripcion_id_suscripcion)
);

-- Table: producto
CREATE TABLE producto (
    producto_id_producto serial  NOT NULL,
    producto_nombre varchar(150)  NOT NULL,
    producto_descripcion varchar(250)  NOT NULL,
    producto_foto varchar(250)  NOT NULL,
    producto_fecha_creacion date  NOT NULL,
    producto_estado boolean  NOT NULL,
    CONSTRAINT producto_pk PRIMARY KEY (producto_id_producto)
);

-- Table: productor
CREATE TABLE productor (
    productor_id_productor serial  NOT NULL,
    productor_nombre varchar(100)  NOT NULL,
    productor_descripcion varchar(100)  NOT NULL,
    CONSTRAINT productor_pk PRIMARY KEY (productor_id_productor)
);

-- Table: realiza
CREATE TABLE realiza (
    realizapqrs_id_pgrs int  NOT NULL,
    realizacuenta_id_cuenta int  NOT NULL,
    CONSTRAINT realiza_pk PRIMARY KEY (realizapqrs_id_pgrs,realizacuenta_id_cuenta)
);

-- Table: responde
CREATE TABLE responde (
    responde_cuenta_id_cuenta int  NOT NULL,
    responde_pqrs_id_pgrs int  NOT NULL,
    CONSTRAINT responde_pk PRIMARY KEY (responde_cuenta_id_cuenta,responde_pqrs_id_pgrs)
);

-- Table: rol
CREATE TABLE rol (
    rol_id_rol serial  NOT NULL,
    rol_descripcion varchar(200)  NOT NULL,
    rol_fecha date  NOT NULL,
    rol_nombre varchar(100)  NOT NULL,
    CONSTRAINT rol_pk PRIMARY KEY (rol_id_rol)
);

-- Table: rol_modulo
CREATE TABLE rol_modulo (
    rolmodu_id_rol int  NOT NULL,
    rolmodu_id_modulo int  NOT NULL,
    CONSTRAINT rol_modulo_pk PRIMARY KEY (rolmodu_id_rol,rolmodu_id_modulo)
);

-- Table: suscripcion
CREATE TABLE suscripcion (
    suscripcion_id_suscripcion serial  NOT NULL,
    suscripcion_fecha date  NOT NULL,
    suscripcion_estado boolean  NOT NULL,
    suscripcion_producto_id_producto int  NOT NULL,
    CONSTRAINT suscripcion_pk PRIMARY KEY (suscripcion_id_suscripcion)
);

-- Table: tipo
CREATE TABLE tipo (
    tipo_id_tipo serial  NOT NULL,
    tipo_nombre varchar(100)  NOT NULL,
    tipo_descripcion varchar(100)  NOT NULL,
    CONSTRAINT tipo_pk PRIMARY KEY (tipo_id_tipo)
);

-- Table: tipo_cuenta
CREATE TABLE tipo_cuenta (
    tipo_cuenta_id_tipo serial  NOT NULL,
    tipo_cuenta_nombre varchar(150)  NOT NULL,
    CONSTRAINT tipo_cuenta_pk PRIMARY KEY (tipo_cuenta_id_tipo)
);

-- Table: usuario
CREATE TABLE usuario (
    usuario_nickname varchar(50)  NOT NULL,
    usuario_nombres varchar(60)  NOT NULL,
    usuario_apellidos varchar(60)  NOT NULL,
    usuario_tipo_doc varchar(30)  NOT NULL,
    usuario_num_doc int  NOT NULL,
    usuario_telefono numeric  NOT NULL,
    usuario_email varchar(60)  NOT NULL,
    usuario_nro_cuenta int  NOT NULL,
    usuario_fecha_registro date  NOT NULL,
    usuario_cuentaban_nro_cuenta numeric  NOT NULL,
    usuario_foto_perfil varchar(250)  NOT NULL,
    CONSTRAINT usuario_pk PRIMARY KEY (usuario_nickname)
);

-- Table: variedad
CREATE TABLE variedad (
    variedad_id_variedad serial  NOT NULL,
    variedad_nombre varchar(100)  NOT NULL,
    variedad_descripcion varchar(100)  NOT NULL,
    CONSTRAINT variedad_pk PRIMARY KEY (variedad_id_variedad)
);

-- foreign keys
-- Reference: Responde_cuenta (table: responde)
ALTER TABLE responde ADD CONSTRAINT Responde_cuenta
    FOREIGN KEY (responde_cuenta_id_cuenta)
    REFERENCES cuenta (cuenta_id_cuenta) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: Responde_pqrs (table: responde)
ALTER TABLE responde ADD CONSTRAINT Responde_pqrs
    FOREIGN KEY (responde_pqrs_id_pgrs)
    REFERENCES pqrs (pqrs_id_pgrs) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: agregar_deseo_catalogo (table: agregar_deseo)
ALTER TABLE agregar_deseo ADD CONSTRAINT agregar_deseo_catalogo
    FOREIGN KEY (agregar_deseo_catalogo_id_catalogo)
    REFERENCES catalogo (catalogo_id_catalogo) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: agregar_deseo_usuario (table: agregar_deseo)
ALTER TABLE agregar_deseo ADD CONSTRAINT agregar_deseo_usuario
    FOREIGN KEY (agregar_deseo_user)
    REFERENCES usuario (usuario_nickname) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: cafe_finca (table: cafe)
ALTER TABLE cafe ADD CONSTRAINT cafe_finca
    FOREIGN KEY (cafe_id_finca)
    REFERENCES finca (finca_id_finca) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: cafe_origen (table: cafe)
ALTER TABLE cafe ADD CONSTRAINT cafe_origen
    FOREIGN KEY (cafe_id_origen)
    REFERENCES origen (tipo_id_origen) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: cafe_perfil (table: cafe)
ALTER TABLE cafe ADD CONSTRAINT cafe_perfil
    FOREIGN KEY (cafe_id_perfil)
    REFERENCES perfil (perfil_id_perfil) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: cafe_producto (table: cafe)
ALTER TABLE cafe ADD CONSTRAINT cafe_producto
    FOREIGN KEY (cafe_id_producto)
    REFERENCES producto (producto_id_producto) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: cafe_productor (table: cafe)
ALTER TABLE cafe ADD CONSTRAINT cafe_productor
    FOREIGN KEY (cafe_id_productor)
    REFERENCES productor (productor_id_productor) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: cafe_tipo (table: cafe)
ALTER TABLE cafe ADD CONSTRAINT cafe_tipo
    FOREIGN KEY (cafe_id_tipo)
    REFERENCES tipo (tipo_id_tipo) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: cafe_variedad (table: cafe)
ALTER TABLE cafe ADD CONSTRAINT cafe_variedad
    FOREIGN KEY (cafe_id_variedad)
    REFERENCES variedad (variedad_id_variedad) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: calificar_catalogo (table: calificar)
ALTER TABLE calificar ADD CONSTRAINT calificar_catalogo
    FOREIGN KEY (calificar_catalogo_id_catalogo)
    REFERENCES catalogo (catalogo_id_catalogo) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: calificar_usuario (table: calificar)
ALTER TABLE calificar ADD CONSTRAINT calificar_usuario
    FOREIGN KEY (calificar_usuario_nickname)
    REFERENCES usuario (usuario_nickname) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: casero_suscripcion (table: casero)
ALTER TABLE casero ADD CONSTRAINT casero_suscripcion
    FOREIGN KEY (casero_suscripcion_id_suscripcion)
    REFERENCES suscripcion (suscripcion_id_suscripcion) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: comentar_catalogo (table: comentario)
ALTER TABLE comentario ADD CONSTRAINT comentar_catalogo
    FOREIGN KEY (comentario_catalogo_id_catalogo)
    REFERENCES catalogo (catalogo_id_catalogo) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: comentar_compartir_compra (table: comentar)
ALTER TABLE comentar ADD CONSTRAINT comentar_compartir_compra
    FOREIGN KEY (comentar_compartir_id_compartir)
    REFERENCES compartir_compra (compartir_compra_id_compartir) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: comentar_usuario (table: comentar)
ALTER TABLE comentar ADD CONSTRAINT comentar_usuario
    FOREIGN KEY (comentar_usuario_nickname)
    REFERENCES usuario (usuario_nickname) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: comentario_usuario (table: comentario)
ALTER TABLE comentario ADD CONSTRAINT comentario_usuario
    FOREIGN KEY (comentario_usuario_nickname)
    REFERENCES usuario (usuario_nickname) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: compartir_catalogo (table: compartir)
ALTER TABLE compartir ADD CONSTRAINT compartir_catalogo
    FOREIGN KEY (compartir_catalogo_id_catalogo)
    REFERENCES catalogo (catalogo_id_catalogo) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: compartir_comentarios_compartir (table: compartir_comentarios)
ALTER TABLE compartir_comentarios ADD CONSTRAINT compartir_comentarios_compartir
    FOREIGN KEY (compartir_comentarios_id)
    REFERENCES compartir (compartir_id) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: compartir_compra_compra (table: compartir_compra)
ALTER TABLE compartir_compra ADD CONSTRAINT compartir_compra_compra
    FOREIGN KEY (compartir_compra_id_compra)
    REFERENCES compra (compra_id_compra) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: compartir_me_gustas_compartir (table: compartir_me_gustas)
ALTER TABLE compartir_me_gustas ADD CONSTRAINT compartir_me_gustas_compartir
    FOREIGN KEY (compartir_me_gusta_id)
    REFERENCES compartir (compartir_id) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: compartir_usuario (table: compartir)
ALTER TABLE compartir ADD CONSTRAINT compartir_usuario
    FOREIGN KEY (compartir_usuario_nickname)
    REFERENCES usuario (usuario_nickname) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: compra_catalogo (table: compra)
ALTER TABLE compra ADD CONSTRAINT compra_catalogo
    FOREIGN KEY (catalogo_compra_id_catalogo)
    REFERENCES catalogo (catalogo_id_catalogo) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: compra_domicilio (table: compra)
ALTER TABLE compra ADD CONSTRAINT compra_domicilio
    FOREIGN KEY (domicilio_compra_id_domicilio)
    REFERENCES domicilio (domicilio_id_domicilio) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: compra_usuario (table: compra)
ALTER TABLE compra ADD CONSTRAINT compra_usuario
    FOREIGN KEY (usuario_compra_nickname)
    REFERENCES usuario (usuario_nickname) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: crear_cuenta (table: crea_producto)
ALTER TABLE crea_producto ADD CONSTRAINT crear_cuenta
    FOREIGN KEY (cuenta_cuenta_id_cuenta)
    REFERENCES cuenta (cuenta_id_cuenta) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: crear_producto (table: crea_producto)
ALTER TABLE crea_producto ADD CONSTRAINT crear_producto
    FOREIGN KEY (producto_crear_id_producto)
    REFERENCES producto (producto_id_producto) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: cuenta_suscripcion (table: cuenta)
ALTER TABLE cuenta ADD CONSTRAINT cuenta_suscripcion
    FOREIGN KEY (cuenta_suscripcion_id)
    REFERENCES suscripcion (suscripcion_id_suscripcion) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: cuenta_tipo_cuenta (table: cuenta)
ALTER TABLE cuenta ADD CONSTRAINT cuenta_tipo_cuenta
    FOREIGN KEY (cuenta_tipo_id)
    REFERENCES tipo_cuenta (tipo_cuenta_id_tipo) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: cuenta_usuario (table: cuenta)
ALTER TABLE cuenta ADD CONSTRAINT cuenta_usuario
    FOREIGN KEY (cuenta_username)
    REFERENCES usuario (usuario_nickname) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: direccion_domicilio_domicilio (table: direccion_domicilio)
ALTER TABLE direccion_domicilio ADD CONSTRAINT direccion_domicilio_domicilio
    FOREIGN KEY (direccion_domicilio_id_domicilio)
    REFERENCES domicilio (domicilio_id_domicilio) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: direcciones_usuario_usuario (table: direcciones_usuario)
ALTER TABLE direcciones_usuario ADD CONSTRAINT direcciones_usuario_usuario
    FOREIGN KEY (dirusuario_nickname)
    REFERENCES usuario (usuario_nickname) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: empresarial_suscripcion (table: empresarial)
ALTER TABLE empresarial ADD CONSTRAINT empresarial_suscripcion
    FOREIGN KEY (suscripcion_suscripcion_id_suscripcion)
    REFERENCES suscripcion (suscripcion_id_suscripcion) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: especial_suscripcion (table: especial)
ALTER TABLE especial ADD CONSTRAINT especial_suscripcion
    FOREIGN KEY (suscripcion_suscripcion_id_suscripcion)
    REFERENCES suscripcion (suscripcion_id_suscripcion) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: me_gusta_compartir_compra (table: me_gusta)
ALTER TABLE me_gusta ADD CONSTRAINT me_gusta_compartir_compra
    FOREIGN KEY (me_gusta_compartir_id_compartir)
    REFERENCES compartir_compra (compartir_compra_id_compartir) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: me_gusta_usuario (table: me_gusta)
ALTER TABLE me_gusta ADD CONSTRAINT me_gusta_usuario
    FOREIGN KEY (usuario_me_gusta_nickname)
    REFERENCES usuario (usuario_nickname) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: modulo_objetos_mod_modulo (table: modulo_objetos_mod)
ALTER TABLE modulo_objetos_mod ADD CONSTRAINT modulo_objetos_mod_modulo
    FOREIGN KEY (modulo_objetos_mod_id_modulo)
    REFERENCES modulo (modulo_id_modulo) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: modulo_objetos_mod_objetos_modulo (table: modulo_objetos_mod)
ALTER TABLE modulo_objetos_mod ADD CONSTRAINT modulo_objetos_mod_objetos_modulo
    FOREIGN KEY (modulo_objetos_mod_id_objeto)
    REFERENCES objetos_modulo (objetos_modulo_id_objeto) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: otros_otro_tipo_producto (table: otros)
ALTER TABLE otros ADD CONSTRAINT otros_otro_tipo_producto
    FOREIGN KEY (otro_tipo_id_otro_tipo)
    REFERENCES otro_tipo_producto (otro_tipo_producto_id_otro_tipo) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: otros_producto (table: otros)
ALTER TABLE otros ADD CONSTRAINT otros_producto
    FOREIGN KEY (producto_otros_id_producto)
    REFERENCES producto (producto_id_producto) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: preferencia_cuenta_cuenta (table: preferencia_cuenta)
ALTER TABLE preferencia_cuenta ADD CONSTRAINT preferencia_cuenta_cuenta
    FOREIGN KEY (prefcuenta_id_cuenta)
    REFERENCES cuenta (cuenta_id_cuenta) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: preferencia_cuenta_preferencias (table: preferencia_cuenta)
ALTER TABLE preferencia_cuenta ADD CONSTRAINT preferencia_cuenta_preferencias
    FOREIGN KEY (prefcuenta_id_preferencia)
    REFERENCES preferencias (preferencia_id_preferencia) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: probadita_suscripcion (table: probadita)
ALTER TABLE probadita ADD CONSTRAINT probadita_suscripcion
    FOREIGN KEY (probadita_suscripcion_id_suscripcion)
    REFERENCES suscripcion (suscripcion_id_suscripcion) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: realiza_cuenta (table: realiza)
ALTER TABLE realiza ADD CONSTRAINT realiza_cuenta
    FOREIGN KEY (realizacuenta_id_cuenta)
    REFERENCES cuenta (cuenta_id_cuenta) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: realiza_pqrs (table: realiza)
ALTER TABLE realiza ADD CONSTRAINT realiza_pqrs
    FOREIGN KEY (realizapqrs_id_pgrs)
    REFERENCES pqrs (pqrs_id_pgrs) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: rol_cuenta (table: cuenta)
ALTER TABLE cuenta ADD CONSTRAINT rol_cuenta
    FOREIGN KEY (cuenta_rol_id)
    REFERENCES rol (rol_id_rol) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: rol_modulo_modulo (table: rol_modulo)
ALTER TABLE rol_modulo ADD CONSTRAINT rol_modulo_modulo
    FOREIGN KEY (rolmodu_id_modulo)
    REFERENCES modulo (modulo_id_modulo) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: rol_modulo_rol (table: rol_modulo)
ALTER TABLE rol_modulo ADD CONSTRAINT rol_modulo_rol
    FOREIGN KEY (rolmodu_id_rol)
    REFERENCES rol (rol_id_rol) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: suscripcion_producto (table: suscripcion)
ALTER TABLE suscripcion ADD CONSTRAINT suscripcion_producto
    FOREIGN KEY (suscripcion_producto_id_producto)
    REFERENCES producto (producto_id_producto) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: usuario_cuenta_bancaria (table: usuario)
ALTER TABLE usuario ADD CONSTRAINT usuario_cuenta_bancaria
    FOREIGN KEY (usuario_cuentaban_nro_cuenta)
    REFERENCES cuenta_bancaria (cuentaban_nro_cuenta) 
    ON UPDATE  CASCADE 
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- End of file.

