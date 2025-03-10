<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <!-- Template to match the root 'games' element -->
    <xsl:template match="/games">
        <html>
            <head>
                <title>Game Cards</title>
                <!-- Linking External CSS -->
                <link rel="stylesheet" type="text/css" href="/XML/styles.css"/>
            </head>
            <body>
                <div class="container">
                    <xsl:apply-templates select="game"/>
                </div>
            </body>
        </html>
    </xsl:template>

    <!-- Template to match each 'game' element -->
    <xsl:template match="game">
        <div class="card">
            <img>
                <xsl:attribute name="src">
                    <xsl:value-of select="image/@src"/>
                </xsl:attribute>
                <xsl:attribute name="alt">
                    <xsl:value-of select="title"/>
                </xsl:attribute>
            </img>
            <div class="card-body">
                <h5 class="card-title">
                    <xsl:value-of select="title"/>
                </h5>
            </div>
        </div>
    </xsl:template>

</xsl:stylesheet>
