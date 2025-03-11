<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <!-- Template for matching the root -->
    <xsl:template match="/games">
        <html>
            <head>
                <title>Trending Games</title>
                <link rel="stylesheet" type="text/css" href="/CSSxml/styles.css"/>
            </head>
            <body>
                <div class="trending-games-container">
                    <xsl:for-each select="game">
                        <div class="game-card">
                            <img>
                                <xsl:attribute name="src">
                                    <xsl:value-of select="image"/>
                                </xsl:attribute>
                                <xsl:attribute name="alt">
                                    <xsl:value-of select="name"/>
                                </xsl:attribute>
                            </img>
                            <h4>
                                <xsl:value-of select="name"/>
                            </h4>
                            <p>
                                <xsl:value-of select="price"/>
                            </p>
                        </div>
                    </xsl:for-each>
                </div>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
