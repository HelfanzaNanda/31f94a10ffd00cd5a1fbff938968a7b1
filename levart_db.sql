-- -------------------------------------------------------------
-- -------------------------------------------------------------
-- TablePlus 1.1.8
--
-- https://tableplus.com/
--
-- Database: postgres
-- Generation Time: 2024-07-31 22:11:45.723496
-- -------------------------------------------------------------

-- This script only contains the table creation statements and does not fully represent the table in database. It's still missing: indices, triggers. Do not use it as backup.

-- Table Definition
CREATE TABLE "public"."jobs" (
    "id" int4 NOT NULL,
    "running" int4 NOT NULL,
    "queue" varchar NOT NULL,
    "payload" text NOT NULL,
    "created_at" timestamp NOT NULL,
    PRIMARY KEY ("id")
);

-- This script only contains the table creation statements and does not fully represent the table in database. It's still missing: indices, triggers. Do not use it as backup.

-- Table Definition
CREATE TABLE "public"."oauth_access_tokens" (
    "access_token" varchar NOT NULL,
    "client_id" varchar NOT NULL,
    "user_id" varchar DEFAULT NULL::character varying,
    "expires" timestamp NOT NULL,
    "scope" varchar DEFAULT NULL::character varying,
    PRIMARY KEY ("access_token")
);

-- This script only contains the table creation statements and does not fully represent the table in database. It's still missing: indices, triggers. Do not use it as backup.

-- Table Definition
CREATE TABLE "public"."oauth_authorization_codes" (
    "authorizationcode" varchar NOT NULL,
    "client_id" varchar NOT NULL,
    "user_id" varchar DEFAULT NULL::character varying,
    "redirect_uri" varchar DEFAULT NULL::character varying,
    "expires" timestamp NOT NULL,
    "scope" varchar DEFAULT NULL::character varying,
    "id_token" varchar DEFAULT NULL::character varying,
    PRIMARY KEY ("authorizationcode")
);

-- This script only contains the table creation statements and does not fully represent the table in database. It's still missing: indices, triggers. Do not use it as backup.

-- Table Definition
CREATE TABLE "public"."oauth_clients" (
    "client_id" varchar NOT NULL,
    "client_secret" varchar DEFAULT NULL::character varying,
    "redirect_uri" varchar DEFAULT NULL::character varying,
    "grant_types" varchar DEFAULT NULL::character varying,
    "scope" varchar DEFAULT NULL::character varying,
    "user_id" varchar DEFAULT NULL::character varying,
    PRIMARY KEY ("client_id")
);

-- This script only contains the table creation statements and does not fully represent the table in database. It's still missing: indices, triggers. Do not use it as backup.

-- Table Definition
CREATE TABLE "public"."oauth_jti" (
    "issuer" varchar NOT NULL,
    "subject" varchar DEFAULT NULL::character varying,
    "audience" varchar DEFAULT NULL::character varying,
    "expires" timestamp NOT NULL,
    "jti" varchar NOT NULL,
    PRIMARY KEY ("issuer")
);

-- This script only contains the table creation statements and does not fully represent the table in database. It's still missing: indices, triggers. Do not use it as backup.

-- Table Definition
CREATE TABLE "public"."oauth_jwt" (
    "clientid" varchar NOT NULL,
    "subject" varchar DEFAULT NULL::character varying,
    "public_key" varchar NOT NULL,
    PRIMARY KEY ("clientid")
);

-- This script only contains the table creation statements and does not fully represent the table in database. It's still missing: indices, triggers. Do not use it as backup.

-- Table Definition
CREATE TABLE "public"."oauth_public_keys" (
    "client_id" varchar NOT NULL,
    "public_key" varchar NOT NULL,
    "private_key" varchar NOT NULL,
    "encryption_algorithm" varchar NOT NULL DEFAULT 'RS256'::character varying,
    PRIMARY KEY ("client_id")
);

-- This script only contains the table creation statements and does not fully represent the table in database. It's still missing: indices, triggers. Do not use it as backup.

-- Table Definition
CREATE TABLE "public"."oauth_refresh_tokens" (
    "refresh_token" varchar NOT NULL,
    "client_id" varchar NOT NULL,
    "user_id" varchar DEFAULT NULL::character varying,
    "expires" timestamp NOT NULL,
    "scope" varchar DEFAULT NULL::character varying,
    PRIMARY KEY ("refresh_token")
);

-- This script only contains the table creation statements and does not fully represent the table in database. It's still missing: indices, triggers. Do not use it as backup.

-- Table Definition
CREATE TABLE "public"."oauth_scopes" (
    "scope" varchar NOT NULL,
    "is_default" bool,
    PRIMARY KEY ("scope")
);

-- This script only contains the table creation statements and does not fully represent the table in database. It's still missing: indices, triggers. Do not use it as backup.

-- Table Definition
CREATE TABLE "public"."oauth_users" (
    "id" int4 NOT NULL,
    "name" varchar NOT NULL,
    "email" varchar NOT NULL,
    "email_verified" bool NOT NULL DEFAULT true,
    "username" varchar NOT NULL,
    "scope" varchar DEFAULT NULL::character varying,
    "password" varchar NOT NULL,
    PRIMARY KEY ("id")
);

-- This script only contains the table creation statements and does not fully represent the table in database. It's still missing: indices, triggers. Do not use it as backup.

-- Table Definition
CREATE TABLE "public"."users" (
    "id" int4 NOT NULL,
    "name" varchar NOT NULL,
    "email" varchar NOT NULL,
    "email_verified" bool NOT NULL DEFAULT true,
    "username" varchar NOT NULL,
    "scope" varchar DEFAULT NULL::character varying,
    "password" varchar NOT NULL,
    PRIMARY KEY ("id")
);

INSERT INTO "public"."oauth_access_tokens" ("access_token","client_id","user_id","expires","scope") VALUES 
('c84b8d4255753b437772e8d94d43ba4180345d6a','testclient','admin','2024-07-31 14:29:29','app'),
('8a03969e9ea97c7b62becdc590347ca80e47ddde','testclient','admin','2024-07-31 14:30:18','app'),
('06b50a4236357772864537b80d0687769a02d4cc','testclient','admin','2024-07-31 14:30:31','app'),
('4b901dd74d7fa6b4669d70573da8bf73d0cc1e62','testclient','admin','2024-07-31 14:30:43','app'),
('50e64b182b34088018734b2f4953c592b5f5d23a','testclient','admin','2024-07-31 14:31:21','app'),
('20431658db9c7019fe3ced6447d6f17caafb2dd2','testclient','admin','2024-08-31 14:39:25','app'),
('e8280248ac8e2c4aa83d18980d6e7356e1cab4dd','testclient','admin','2024-08-31 14:41:08','app'),
('338698a6fb599deb2096a3ee834e75a821ca7a1f','testclient','admin','2024-07-31 14:45:15','app'),
('1f847c9caf8ba4fb8bece46a9a56e4c75e310f05','testclient','admin','2024-07-31 15:59:15','app');

INSERT INTO "public"."oauth_clients" ("client_id","client_secret","redirect_uri","grant_types","scope","user_id") VALUES ('testclient','testsecret',NULL,'password','app',NULL);

INSERT INTO "public"."oauth_refresh_tokens" ("refresh_token","client_id","user_id","expires","scope") VALUES 
('b03cb65a24d61751977223979023a99d08d9ff3e','testclient','admin','2024-08-14 13:30:18','app'),
('3f8e962555dd07583d45cc597583d279cb9262fa','testclient','admin','2024-08-14 13:30:31','app'),
('61a84a699a9fcbcae80ba3c37c46f82828f00f19','testclient','admin','2024-08-14 13:30:43','app'),
('4eaeff4c03262e180ee8fb3e81fff0893cc44798','testclient','admin','2024-08-14 13:31:21','app'),
('97ced68210e990c77a61f77b2d7b6f462ce298bb','testclient','admin','2024-08-14 13:39:25','app'),
('2430e41c881645576f3afb602c5674622ff5d6ad','testclient','admin','2024-08-14 13:41:08','app'),
('ceb2f8daf603ee44ab53b57f5b62a4c55cdd8e59','testclient','admin','2024-08-14 13:45:15','app'),
('d344fe0bbb577adffe74807598d7b1519f97cafb','testclient','admin','2024-08-14 14:59:15','app');

INSERT INTO "public"."oauth_users" ("id","name","email","email_verified","username","scope","password") VALUES 
(1,'admin','admin@admin.com','TRUE','admin','app','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(2,'Mrs. Marcelle Lockman','jspinka@example.com','TRUE','ezra.rau',NULL,'5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(3,'Leta Weissnat','gerhold.kylie@example.net','TRUE','justus51',NULL,'5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(4,'Prof. Lane Batz MD','raufderhar@example.com','TRUE','bnikolaus',NULL,'5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(5,'Dr. London Williamson','habernathy@example.org','TRUE','celestine96',NULL,'5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(6,'Andreane Monahan Sr.','rachael.graham@example.org','TRUE','elna.crist',NULL,'5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(7,'Preston Marvin','igibson@example.com','TRUE','iva91',NULL,'5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(8,'Vita Walker','lorenzo.carroll@example.org','TRUE','verda74',NULL,'5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(9,'Dr. Christian Schultz DDS','mariane54@example.com','TRUE','laney.murazik',NULL,'5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(10,'Okey Carroll','clementina25@example.net','TRUE','madelynn.schimmel',NULL,'5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(11,'Dr. Oran Bayer','norval.bruen@example.org','TRUE','issac.sipes',NULL,'5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8');

INSERT INTO "public"."users" ("id","name","email","email_verified","username","scope","password") VALUES 
(12,'admin','admin@admin.com','TRUE','admin','app','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(13,'Dr. Theodore Zemlak','sabrina35@example.org','TRUE','senger.jacynthe',NULL,'5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(14,'Miss Aisha Tromp','alexis94@example.org','TRUE','bernier.jovanny',NULL,'5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(15,'Miss Clarabelle Christiansen Jr.','roel.murazik@example.com','TRUE','gutkowski.marty',NULL,'5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8');

