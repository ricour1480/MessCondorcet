--
-- PostgreSQL database dump
--

-- Dumped from database version 10.6
-- Dumped by pg_dump version 10.6

-- Started on 2018-11-22 13:40:32

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 1 (class 3079 OID 12278)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2218 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: -
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 196 (class 1259 OID 16386)
-- Name: admin; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.admin (
    id_admin integer NOT NULL,
    login text NOT NULL,
    mdp text NOT NULL
);


--
-- TOC entry 197 (class 1259 OID 16392)
-- Name: admin_id_admin_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.admin_id_admin_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2219 (class 0 OID 0)
-- Dependencies: 197
-- Name: admin_id_admin_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.admin_id_admin_seq OWNED BY public.admin.id_admin;


--
-- TOC entry 198 (class 1259 OID 16394)
-- Name: categorie; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.categorie (
    id_categorie integer NOT NULL,
    libelle_categorie text NOT NULL
);


--
-- TOC entry 199 (class 1259 OID 16400)
-- Name: categorie_id_categorie_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.categorie_id_categorie_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2220 (class 0 OID 0)
-- Dependencies: 199
-- Name: categorie_id_categorie_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.categorie_id_categorie_seq OWNED BY public.categorie.id_categorie;


--
-- TOC entry 200 (class 1259 OID 16402)
-- Name: commande; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.commande (
    id_user integer NOT NULL,
    id_produit integer NOT NULL,
    date date NOT NULL,
    statut integer NOT NULL,
    qte integer NOT NULL
);


--
-- TOC entry 201 (class 1259 OID 16405)
-- Name: commande_admin; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.commande_admin (
    id_admin integer NOT NULL,
    id_produit integer NOT NULL,
    date date NOT NULL,
    recu integer,
    qte integer NOT NULL
);


--
-- TOC entry 202 (class 1259 OID 16408)
-- Name: produit; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.produit (
    id_produit integer NOT NULL,
    id_categorie integer NOT NULL,
    nom_produit text NOT NULL,
    prix_produit real NOT NULL,
    stock_min integer NOT NULL
);


--
-- TOC entry 203 (class 1259 OID 16414)
-- Name: produit_id_produit_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.produit_id_produit_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2221 (class 0 OID 0)
-- Dependencies: 203
-- Name: produit_id_produit_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.produit_id_produit_seq OWNED BY public.produit.id_produit;


--
-- TOC entry 204 (class 1259 OID 16416)
-- Name: utilisateur; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.utilisateur (
    id_user integer NOT NULL,
    nom text NOT NULL,
    prenom text NOT NULL,
    login text NOT NULL,
    password text NOT NULL,
    credit double precision NOT NULL
);


--
-- TOC entry 205 (class 1259 OID 16422)
-- Name: utilisateur_id_user_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.utilisateur_id_user_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2222 (class 0 OID 0)
-- Dependencies: 205
-- Name: utilisateur_id_user_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.utilisateur_id_user_seq OWNED BY public.utilisateur.id_user;


--
-- TOC entry 2054 (class 2604 OID 16424)
-- Name: admin id_admin; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.admin ALTER COLUMN id_admin SET DEFAULT nextval('public.admin_id_admin_seq'::regclass);


--
-- TOC entry 2055 (class 2604 OID 16425)
-- Name: categorie id_categorie; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.categorie ALTER COLUMN id_categorie SET DEFAULT nextval('public.categorie_id_categorie_seq'::regclass);


--
-- TOC entry 2056 (class 2604 OID 16426)
-- Name: produit id_produit; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.produit ALTER COLUMN id_produit SET DEFAULT nextval('public.produit_id_produit_seq'::regclass);


--
-- TOC entry 2057 (class 2604 OID 16427)
-- Name: utilisateur id_user; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.utilisateur ALTER COLUMN id_user SET DEFAULT nextval('public.utilisateur_id_user_seq'::regclass);


--
-- TOC entry 2201 (class 0 OID 16386)
-- Dependencies: 196
-- Data for Name: admin; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 2203 (class 0 OID 16394)
-- Dependencies: 198
-- Data for Name: categorie; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.categorie (id_categorie, libelle_categorie) VALUES (1, 'Petit déjeuner');
INSERT INTO public.categorie (id_categorie, libelle_categorie) VALUES (2, 'Menu');
INSERT INTO public.categorie (id_categorie, libelle_categorie) VALUES (3, 'Salade');
INSERT INTO public.categorie (id_categorie, libelle_categorie) VALUES (4, 'Potage');
INSERT INTO public.categorie (id_categorie, libelle_categorie) VALUES (5, 'Sandwich');
INSERT INTO public.categorie (id_categorie, libelle_categorie) VALUES (6, 'Dessert');
INSERT INTO public.categorie (id_categorie, libelle_categorie) VALUES (7, 'Boissons');


--
-- TOC entry 2205 (class 0 OID 16402)
-- Dependencies: 200
-- Data for Name: commande; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 2206 (class 0 OID 16405)
-- Dependencies: 201
-- Data for Name: commande_admin; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 2207 (class 0 OID 16408)
-- Dependencies: 202
-- Data for Name: produit; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 2209 (class 0 OID 16416)
-- Dependencies: 204
-- Data for Name: utilisateur; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.utilisateur (id_user, nom, prenom, login, password, credit) VALUES (2, 'Toto', 'toto', 'toto@condorcet.be', '1cGxDG7d2J1Hc', 20);
INSERT INTO public.utilisateur (id_user, nom, prenom, login, password, credit) VALUES (3, 'test', 'test', 'test.test@condorcet.be', '1cyNvNOLyQaUQ', 25);
INSERT INTO public.utilisateur (id_user, nom, prenom, login, password, credit) VALUES (6, 'Nom', 'Prenom', 'nom@condorcet.be', '1cKXUzSkl24Yc', 25);


--
-- TOC entry 2223 (class 0 OID 0)
-- Dependencies: 197
-- Name: admin_id_admin_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.admin_id_admin_seq', 1, false);


--
-- TOC entry 2224 (class 0 OID 0)
-- Dependencies: 199
-- Name: categorie_id_categorie_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.categorie_id_categorie_seq', 7, true);


--
-- TOC entry 2225 (class 0 OID 0)
-- Dependencies: 203
-- Name: produit_id_produit_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.produit_id_produit_seq', 1, false);


--
-- TOC entry 2226 (class 0 OID 0)
-- Dependencies: 205
-- Name: utilisateur_id_user_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.utilisateur_id_user_seq', 6, true);


--
-- TOC entry 2059 (class 2606 OID 16429)
-- Name: admin pk_admin; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.admin
    ADD CONSTRAINT pk_admin PRIMARY KEY (id_admin);


--
-- TOC entry 2061 (class 2606 OID 16431)
-- Name: categorie pk_categorie; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.categorie
    ADD CONSTRAINT pk_categorie PRIMARY KEY (id_categorie);


--
-- TOC entry 2065 (class 2606 OID 16433)
-- Name: commande pk_commande; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.commande
    ADD CONSTRAINT pk_commande PRIMARY KEY (id_user, id_produit);


--
-- TOC entry 2069 (class 2606 OID 16435)
-- Name: commande_admin pk_commande_admin; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.commande_admin
    ADD CONSTRAINT pk_commande_admin PRIMARY KEY (id_admin, id_produit);


--
-- TOC entry 2072 (class 2606 OID 16437)
-- Name: produit pk_produit; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.produit
    ADD CONSTRAINT pk_produit PRIMARY KEY (id_produit);


--
-- TOC entry 2074 (class 2606 OID 16439)
-- Name: utilisateur pk_utilisateur; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.utilisateur
    ADD CONSTRAINT pk_utilisateur PRIMARY KEY (id_user);


--
-- TOC entry 2066 (class 1259 OID 16440)
-- Name: i_fk_commande_admin_admin; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX i_fk_commande_admin_admin ON public.commande_admin USING btree (id_admin);


--
-- TOC entry 2067 (class 1259 OID 16441)
-- Name: i_fk_commande_admin_produit; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX i_fk_commande_admin_produit ON public.commande_admin USING btree (id_produit);


--
-- TOC entry 2062 (class 1259 OID 16442)
-- Name: i_fk_commande_produit; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX i_fk_commande_produit ON public.commande USING btree (id_produit);


--
-- TOC entry 2063 (class 1259 OID 16443)
-- Name: i_fk_commande_utilisateur; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX i_fk_commande_utilisateur ON public.commande USING btree (id_user);


--
-- TOC entry 2070 (class 1259 OID 16444)
-- Name: i_fk_produit_categorie; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX i_fk_produit_categorie ON public.produit USING btree (id_categorie);


--
-- TOC entry 2077 (class 2606 OID 16445)
-- Name: commande_admin fk_commande_admin_admin; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.commande_admin
    ADD CONSTRAINT fk_commande_admin_admin FOREIGN KEY (id_admin) REFERENCES public.admin(id_admin);


--
-- TOC entry 2078 (class 2606 OID 16450)
-- Name: commande_admin fk_commande_admin_produit; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.commande_admin
    ADD CONSTRAINT fk_commande_admin_produit FOREIGN KEY (id_produit) REFERENCES public.produit(id_produit);


--
-- TOC entry 2075 (class 2606 OID 16455)
-- Name: commande fk_commande_produit; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.commande
    ADD CONSTRAINT fk_commande_produit FOREIGN KEY (id_produit) REFERENCES public.produit(id_produit);


--
-- TOC entry 2076 (class 2606 OID 16460)
-- Name: commande fk_commande_utilisateur; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.commande
    ADD CONSTRAINT fk_commande_utilisateur FOREIGN KEY (id_user) REFERENCES public.utilisateur(id_user);


--
-- TOC entry 2079 (class 2606 OID 16465)
-- Name: produit fk_produit_categorie; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.produit
    ADD CONSTRAINT fk_produit_categorie FOREIGN KEY (id_categorie) REFERENCES public.categorie(id_categorie);


-- Completed on 2018-11-22 13:40:34

--
-- PostgreSQL database dump complete
--

