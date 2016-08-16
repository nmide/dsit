------------- SQLite3 Dump File -------------

-- ------------------------------------------
-- Dump of "incidents"
-- ------------------------------------------

CREATE TABLE "incidents"(
	"date" DateTime NOT NULL,
	"description" Text NOT NULL,
	"resolution" Text,
	"assignee" Text NOT NULL DEFAULT admin,
	"timelogged" Integer DEFAULT 0,
	"requestor" Text );

CREATE INDEX "index_date" ON "incidents"( "date" );

