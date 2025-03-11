<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <!-- Template to match the root 'games1' element -->
    <xsl:template match="/games1">
        <html>
            <head>
                <title>Game Cards</title>
                <!-- Linking External CSS -->
                <link rel="stylesheet" type="text/css" href="/CSSxml/SStyles.css"/>
            </head>
            <body>
                <div class="container">
                    <xsl:apply-templates select="game1"/>
                </div>
            </body>
        </html>
    </xsl:template>

    <!-- Template to match each 'game1' element -->
    <xsl:template match="game1">
        <div class="card">
            <!-- Image -->
            <img class="card-img" alt="">
                <xsl:attribute name="src">
                    <xsl:value-of select="image/@src"/>
                </xsl:attribute>
                <xsl:attribute name="alt">
                    <xsl:value-of select="title"/>
                </xsl:attribute>
            </img>

            <div class="card-body">
                <!-- Title -->
                <h5 class="card-title">
                    <xsl:value-of select="title"/>
                </h5>

                <!-- Price -->
                <p class="card-price">
                    Price: $<xsl:value-of select="price"/>
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
