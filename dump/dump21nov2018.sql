
CREATE TABLE public.admin (
    id_admin integer NOT NULL,
    login text NOT NULL,
    mdp text NOT NULL
);


--
-- TOC entry 187 (class 1259 OID 16410)
-- Name: admin_id_admin_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.admin_id_admin_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2193 (class 0 OID 0)
-- Dependencies: 187
-- Name: admin_id_admin_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.admin_id_admin_seq OWNED BY public.admin.id_admin;


--
-- TOC entry 192 (class 1259 OID 16435)
-- Name: categorie; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.categorie (
    id_categorie integer NOT NULL,
    libelle_categorie text NOT NULL
);


--
-- TOC entry 191 (class 1259 OID 16433)
-- Name: categorie_id_categorie_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.categorie_id_categorie_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2194 (class 0 OID 0)
-- Dependencies: 191
-- Name: categorie_id_categorie_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.categorie_id_categorie_seq OWNED BY public.categorie.id_categorie;


--
-- TOC entry 193 (class 1259 OID 16444)
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
-- TOC entry 194 (class 1259 OID 16451)
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
-- TOC entry 190 (class 1259 OID 16423)
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
-- TOC entry 189 (class 1259 OID 16421)
-- Name: produit_id_produit_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.produit_id_produit_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2195 (class 0 OID 0)
-- Dependencies: 189
-- Name: produit_id_produit_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.produit_id_produit_seq OWNED BY public.produit.id_produit;


--
-- TOC entry 186 (class 1259 OID 16401)
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
-- TOC entry 185 (class 1259 OID 16399)
-- Name: utilisateur_id_user_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.utilisateur_id_user_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2196 (class 0 OID 0)
-- Dependencies: 185
-- Name: utilisateur_id_user_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.utilisateur_id_user_seq OWNED BY public.utilisateur.id_user;


--
-- TOC entry 2032 (class 2604 OID 16415)
-- Name: admin id_admin; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.admin ALTER COLUMN id_admin SET DEFAULT nextval('public.admin_id_admin_seq'::regclass);


--
-- TOC entry 2034 (class 2604 OID 16438)
-- Name: categorie id_categorie; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.categorie ALTER COLUMN id_categorie SET DEFAULT nextval('public.categorie_id_categorie_seq'::regclass);


--
-- TOC entry 2033 (class 2604 OID 16426)
-- Name: produit id_produit; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.produit ALTER COLUMN id_produit SET DEFAULT nextval('public.produit_id_produit_seq'::regclass);


--
-- TOC entry 2031 (class 2604 OID 16404)
-- Name: utilisateur id_user; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.utilisateur ALTER COLUMN id_user SET DEFAULT nextval('public.utilisateur_id_user_seq'::regclass);


--
-- TOC entry 2177 (class 0 OID 16412)
-- Dependencies: 188
-- Data for Name: admin; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 2181 (class 0 OID 16435)
-- Dependencies: 192
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
-- TOC entry 2182 (class 0 OID 16444)
-- Dependencies: 193
-- Data for Name: commande; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 2183 (class 0 OID 16451)
-- Dependencies: 194
-- Data for Name: commande_admin; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 2179 (class 0 OID 16423)
-- Dependencies: 190
-- Data for Name: produit; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 2175 (class 0 OID 16401)
-- Dependencies: 186
-- Data for Name: utilisateur; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.utilisateur (id_user, nom, prenom, login, password, credit) VALUES (2, 'Toto', 'toto', 'toto@condorcet.be', '1cGxDG7d2J1Hc', 20);


--
-- TOC entry 2197 (class 0 OID 0)
-- Dependencies: 187
-- Name: admin_id_admin_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.admin_id_admin_seq', 1, false);


--
-- TOC entry 2198 (class 0 OID 0)
-- Dependencies: 191
-- Name: categorie_id_categorie_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.categorie_id_categorie_seq', 7, true);


--
-- TOC entry 2199 (class 0 OID 0)
-- Dependencies: 189
-- Name: produit_id_produit_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.produit_id_produit_seq', 1, false);


--
-- TOC entry 2200 (class 0 OID 0)
-- Dependencies: 185
-- Name: utilisateur_id_user_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.utilisateur_id_user_seq', 2, true);


--
-- TOC entry 2038 (class 2606 OID 16420)
-- Name: admin pk_admin; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.admin
    ADD CONSTRAINT pk_admin PRIMARY KEY (id_admin);


--
-- TOC entry 2043 (class 2606 OID 16443)
-- Name: categorie pk_categorie; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.categorie
    ADD CONSTRAINT pk_categorie PRIMARY KEY (id_categorie);


--
-- TOC entry 2047 (class 2606 OID 16448)
-- Name: commande pk_commande; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.commande
    ADD CONSTRAINT pk_commande PRIMARY KEY (id_user, id_produit);


--
-- TOC entry 2051 (class 2606 OID 16455)
-- Name: commande_admin pk_commande_admin; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.commande_admin
    ADD CONSTRAINT pk_commande_admin PRIMARY KEY (id_admin, id_produit);


--
-- TOC entry 2041 (class 2606 OID 16431)
-- Name: produit pk_produit; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.produit
    ADD CONSTRAINT pk_produit PRIMARY KEY (id_produit);


--
-- TOC entry 2036 (class 2606 OID 16409)
-- Name: utilisateur pk_utilisateur; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.utilisateur
    ADD CONSTRAINT pk_utilisateur PRIMARY KEY (id_user);


--
-- TOC entry 2048 (class 1259 OID 16456)
-- Name: i_fk_commande_admin_admin; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX i_fk_commande_admin_admin ON public.commande_admin USING btree (id_admin);


--
-- TOC entry 2049 (class 1259 OID 16457)
-- Name: i_fk_commande_admin_produit; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX i_fk_commande_admin_produit ON public.commande_admin USING btree (id_produit);


--
-- TOC entry 2044 (class 1259 OID 16450)
-- Name: i_fk_commande_produit; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX i_fk_commande_produit ON public.commande USING btree (id_produit);


--
-- TOC entry 2045 (class 1259 OID 16449)
-- Name: i_fk_commande_utilisateur; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX i_fk_commande_utilisateur ON public.commande USING btree (id_user);


--
-- TOC entry 2039 (class 1259 OID 16432)
-- Name: i_fk_produit_categorie; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX i_fk_produit_categorie ON public.produit USING btree (id_categorie);


--
-- TOC entry 2055 (class 2606 OID 16473)
-- Name: commande_admin fk_commande_admin_admin; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.commande_admin
    ADD CONSTRAINT fk_commande_admin_admin FOREIGN KEY (id_admin) REFERENCES public.admin(id_admin);


--
-- TOC entry 2056 (class 2606 OID 16478)
-- Name: commande_admin fk_commande_admin_produit; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.commande_admin
    ADD CONSTRAINT fk_commande_admin_produit FOREIGN KEY (id_produit) REFERENCES public.produit(id_produit);


--
-- TOC entry 2054 (class 2606 OID 16468)
-- Name: commande fk_commande_produit; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.commande
    ADD CONSTRAINT fk_commande_produit FOREIGN KEY (id_produit) REFERENCES public.produit(id_produit);


--
-- TOC entry 2053 (class 2606 OID 16463)
-- Name: commande fk_commande_utilisateur; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.commande
    ADD CONSTRAINT fk_commande_utilisateur FOREIGN KEY (id_user) REFERENCES public.utilisateur(id_user);


--
-- TOC entry 2052 (class 2606 OID 16458)
-- Name: produit fk_produit_categorie; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.produit
    ADD CONSTRAINT fk_produit_categorie FOREIGN KEY (id_categorie) REFERENCES public.categorie(id_categorie);


-- Completed on 2018-11-21 13:24:26

--
-- PostgreSQL database dump complete
--

