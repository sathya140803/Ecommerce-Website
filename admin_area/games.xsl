<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:output method="html" indent="yes"/>

    <xsl:template match="/">
        <div class="container mt-3">
            <h2>Inserted Games</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Rating</th>
                        <th>Size</th>
                        <th>Company</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    <xsl:for-each select="games/game">
                        <tr>
                            <td>
                                <xsl:value-of select="game_title"/>
                            </td>
                            <td>
                                <xsl:value-of select="game_description"/>
                            </td>
                            <td>
                                <xsl:value-of select="game_price"/>
                            </td>
                            <td>
                                <xsl:value-of select="rating"/>
                            </td>
                            <td>
                                <xsl:value-of select="size"/>
                            </td>
                            <td>
                                <xsl:value-of select="company"/>
                            </td>
                            <td>
                                <xsl:choose>
                                    <xsl:when test="game_image1">
                                        <img src="{game_image1}" alt="Game Image" width="60"/>
                                    </xsl:when>
                                    <xsl:otherwise>N/A</xsl:otherwise>
                                </xsl:choose>
                            </td>
                        </tr>
                    </xsl:for-each>
                </tbody>
            </table>
        </div>
    </xsl:template>
</xsl:stylesheet>
