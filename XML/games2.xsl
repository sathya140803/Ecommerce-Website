<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <!-- Template to match the root 'games' element -->
    <xsl:template match="/games2">
        <html>
            <head>
                <title>Game Cards</title>
                <!-- Linking External CSS -->
                <link rel="stylesheet" type="text/css" href="/CSSxml/SStyles.css"/>
            </head>
            <body>
                <div class="container">
                    <xsl:apply-templates select="game2"/>
                </div>
            </body>
        </html>
    </xsl:template>

    <!-- Template to match each 'game' element -->
    <xsl:template match="game2">
        <div class="card">
            <!-- Game Image -->
            <img>
                <xsl:attribute name="src">
                    <xsl:value-of select="image/@src"/>
                </xsl:attribute>
                <xsl:attribute name="alt">
                    <xsl:value-of select="title"/>
                </xsl:attribute>
            </img>

            <div class="card-body">
                <!-- Game Title -->
                <h5 class="card-title">
                    <xsl:value-of select="title"/>
                </h5>

                <!-- Game Price -->
                <p class="card-price">
                    $                    <xsl:value-of select="price"/>
                </p>

                <!-- Buttons -->
                <div class="btn-container">
                    <a href="#" class="btn cart">Add to Cart</a>
                    <a href="#" class="btn explore">Explore</a>
                </div>
            </div>
        </div>
    </xsl:template>

</xsl:stylesheet>